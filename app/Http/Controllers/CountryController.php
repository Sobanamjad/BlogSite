<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function showCountryPosts(Country $country)
    {
        $posts = $country->posts()->with('user')->latest()->paginate(4);

        return view('country-posts', [
            'country' => $country,
            'posts' => $posts,
            'title' => 'Posts from ' . $country->name,
        ]);
    }
}
