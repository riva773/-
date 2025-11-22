<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;


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
        $liked = Like::where('item_id', $item_id)->where('user_id', $user->id)->exists();
        $comments = $item->comments()->with('user')->get();

        return view('show', compact('item', 'liked', 'user', 'comments'));
    }
}
