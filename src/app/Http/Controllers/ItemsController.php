<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;




class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::with('user')->get();
        return view('index', compact('items'));
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
        $itemImageUrl = $request->file('image_url')->storeAs('item_image', $itemImageName,'public');
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
}
