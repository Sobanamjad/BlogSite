<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //  Validation form user
    // public function addUser(Request $req)
    // {
    //     $req->validate([
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'age' => 'required',
    //         'city' => 'required',
    //     ]);

    //     return $req->all();
    // }

    public function showForm()
    {
        $countries = Country::all();
        $roles = Role::all();

        return view('registration', compact('countries', 'roles'));
    }

    // form requests  -- validation alag krni ha
    // intended --
    // components --
    // footer --
    // page protection -- Complete
    // logout -- Complete
    // owner - posts edit btn (guards, policies) --
    // github - collab dawood-faiz-tvs
    // after register already logged in -- Complete
    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'age' => 'required|integer|min:1',
            'gender' => 'required',
            'country_id' => 'required|exists:countries,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validated['username'],
            'slug' => Str::slug($validated['username']),
            'country_id' => $validated['country_id'],
            'role_id' => $validated['role_id'],
            'password' => Hash::make($validated['password']),
            'email' => $validated['email'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
        ]);

        Auth::login($user);

        return redirect()->route('allpost');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/allpost')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Log out With Session
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // End ------------------------------------------------

    public function usershow()
    {
        $users = DB::table('users')->get();

        return view('allusers', ['data' => $users]);
    }

    public function deleteUser(string $id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->delete();
        if ($user) {
            return redirect()->route('home');
        }
    }

    public function showsPosts(User $user)
    {
        $posts = $user->posts()->with('tags')->latest()->paginate(6);

        return view('author-posts', [
            'title' => 'Posts by ' . $user->name,
            'posts' => $posts,
            'author' => $user
        ]);
    }

    public function showFirstComment(User $user)
    {
        $user->load('firstPostComment');

        return view('user-first-comment', [
            'user' => $user,
            'comment' => $user->firstPostComment,
        ]);
    }

    public function userComments(User $user)
    {
        $comments = $user->postComments()->with('post')->latest()->get();

        return view('user-comments', [
            'user' => $user,
            'comments' => $comments
        ]);
    }
}
