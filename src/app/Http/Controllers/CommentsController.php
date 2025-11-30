<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;



class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {
        $user = Auth::user();
        $itemId = $request->item_id;
        $content = $request->content;
        Comment::create([
            'user_id' => $user->id,
            'item_id' => $itemId,
            'content' => $content,
        ]);
        return redirect()->route('show', $itemId)->with('success', 'コメントしました');
    }
}
