<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'user_id' => auth()->check() ? auth()->id() : null,
        ]);

        return back()->with('success', 'Comment added!');
    }
}
