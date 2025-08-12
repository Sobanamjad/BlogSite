<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('signin');
// });

Route::get('/', [UserController::class, 'showForm'])->name('registerForm');
Route::post('/add', [UserController::class, 'addUser'])->name('addUser');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Form Validation

// Route::view('/', '/signin');

// Route::post('/add', [UserController::class, 'addUser'])->name('addUser');

// -----------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/usershow', [UserController::class, 'usershow'])->name('home');

    Route::get('/user/{id}', [UserController::class, 'singleUser'])->name('view.user');

    Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

    Route::get('/allpost', [PostController::class, 'allPost'])->name('allpost');

    Route::get('/post/{post:slug}', [PostController::class, 'viewpost'])->name('view.post');

    Route::get('/tag/{tag:name}', [TagController::class, 'showesPosts'])->name('tag.posts');

    Route::get('/author/{user:slug}', [AuthorController::class, 'showsPosts'])->name('author.posts');

    Route::post('post/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Has one Through

    Route::get('/user-first-comment/{user:slug}', [UserController::class, 'showFirstComment'])->name('user.first-comment');

    // Has Many Through

    Route::get('/user-comments/{user:slug}', [UserController::class, 'userComments'])->name('user.comments');

    Route::get('/country-posts/{country}', [CountryController::class, 'showCountryPosts'])->name('country.posts');
});
