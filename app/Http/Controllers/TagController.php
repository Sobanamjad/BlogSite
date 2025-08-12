<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showesPosts(Tag $tag)
    {
        // $tag = Tag::with('posts.user', 'posts.tags')
        //           ->where('slug', $slug)
        //           ->firstOrFail();

        // 2. Us tag ki posts paginate karo
        $posts = $tag->posts()->latest()->paginate(4);

        // 3. View ko data bhejo
        return view('tag-posts', [
            'title' => 'Posts tagged: ' . $tag->name,
            'posts' => $posts,
            'tag' => $tag
        ]);
    }

    //  public function showPosts(Tag $tag)
    // {
    //     $tag->load('posts.user', 'posts.tags');
    //     $posts = $tag->posts()->latest()->paginate(6); // Optional pagination

    //     return view('tag-posts', [
    //         'title' => 'Posts tagged: ' . $tag->name,
    //         'posts' => $posts,
    //         'tag' => $tag
    //     ]);
    // }
}
