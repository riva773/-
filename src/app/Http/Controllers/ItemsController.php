<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Http\Request;




class ItemsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('clear')) {
            session()->forget('search_keyword');
        }
        $query = Item::with('user');
        $keyword = session()->get('search_keyword');

        //ログインしていない場合
        if (!auth()->check()) {
            //マイリスト機能はない
            //検索がある時
            if ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                });
            }
            $items = $query->get();
            return view('index', compact('items'));
        }

        //ログインしている場合
        //検索キーワードがある場合
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }
        //マイリストの場合
        if ($request->input('page') === 'mylist' && auth()->check()) {
            $user = auth()->user();
            $query->whereHas('likes', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        $items = $query->get();
        return view('auth/index', compact('items'));
    }

    public function show($item_id)
    {
        $user = Auth::user();
        $item = Item::where('id', $item_id)->first();
        $liked = auth()->check() ?
            Like::where('item_id', $item_id)->where('user_id', $user->id)->exists()
            : false;
        $comments = $item->comments()->with('user')->get();
        return view('show', compact('item', 'liked', 'user', 'comments'));
    }

    public function create()
    {
        return view('auth/sell');
    }

    public function store(ListingItemRequest $request)
    {
        $itemImageName = $request->file('image_url')->getClientOriginalName();
        $itemImageUrl = $request->file('image_url')->storeAs('item_image', $itemImageName, 'public');
        $userId = auth()->id();

        Item::create([
            'name' => $request->name,
            'image_url' => $itemImageUrl,
            'brand' => $request->brand,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'category' => $request->category,
            'status' => $request->status,
            'user_id' => $userId,
        ]);

        return redirect()->route('/');
    }

    public function search(Request $request)
    {
        //送られてきたキーワードを保存
        $keyword = $request->input('keyword');

        //もし検索ワードがあったらsessionとして保存
        //空文字での検索ならsessionを削除
        if (!empty($keyword)) {
            session()->put('search_keyword', $keyword);
        } else {
            session()->forget('search_keyword');
        }

        //検索機能も含めてindexで処理する
        return redirect()->route('/');
    }
}
