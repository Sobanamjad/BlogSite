<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        //  In this its load post and also realtion ship
    // $posts = Post::with(['user', 'tags'])->paginate(6); 
        // -------------

    // And in this first its load posts then and then second command runs relation ship
    $posts = Post::paginate(4); 
    $posts->load(['user', 'tags']);

    // --------------
    $title = "All Posts";

    return view('allpost', [
        'data' => $posts,
        'title' => $title
    ]);
        
        // $posts = Post::with(['user', 'tags'])->get();
        // $title = "All Posts";

        // return view('allpost', [
        //     'data' => $posts,
        //     'title' => $title
        // ]);
    }

    public function viewpost(Post $post)
{

    // Same Conditions
    // $post = Post::with(['user', 'tags'])->where('slug', $slug)->firstOrFail();
    // -----------
    $post->load(['user', 'tags']);
    $title = "View Post";

    return view('singlepost', [
        'data' => $post,
        'title' => $title
    ]);
}
}
