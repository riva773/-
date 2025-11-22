<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Item;


class LikesController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $itemId = $request->input('item_id');
        Like::create([
            'user_id' => $user->id,
            'item_id' => $itemId,
        ]);
        return redirect()->route('show', $itemId)->with('success', 'いいねを押しました');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $itemId = $request->input('item_id');
        $like = Like::where('user_id', $user->id)->where('item_id', $itemId)->first();
        if($like !== null){
            $like->delete();
        }
        return redirect()->route('show', $itemId)->with('success', 'いいねを解除しました');
    }
}
