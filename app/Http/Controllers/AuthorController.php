<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthorController extends Controller
{
    public function showsPosts(User $user)
    {
        $posts = $user->posts()->with('tags')->latest()->paginate(4);

        return view('aurthor-posts', [
            'title' => 'Posts by ' . $user->name,
            'posts' => $posts,
            'author' => $user
        ]);
    }
}
