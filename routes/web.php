<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $post = Post::all();
    return view('home.homepage',compact('post'));
})->name('homepage')->middleware('guest');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage')->middleware('guest');
//

// Authentication routes with email verification
Auth::routes(['verify' => true]);

// Dashboard route protected by authentication and verified email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
});

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('homepage');
})->name('logout');

Route::get('/post_page', [App\Http\Controllers\AdminController::class, 'post_page']);
Route::post('/add_post', [App\Http\Controllers\AdminController::class, 'add_post']);
Route::get('/delete_post/{id}', [App\Http\Controllers\AdminController::class, 'delete_post']);
Route::get('/edit_post/{id}', [App\Http\Controllers\AdminController::class, 'edit_post']);
Route::post('/Update_post/{id}', [App\Http\Controllers\AdminController::class, 'Update_post']);
Route::get('/backtohomepage', function () {
    $post = Post::all();
    return view('home.homepage',compact('post'));
})->name('backtohomepage');
Route::get('/post_details/{id}', [App\Http\Controllers\HomeController::class, 'post_details']);
Route::get('/my_post', [App\Http\Controllers\HomeController::class, 'my_post'])->middleware('auth');

Route::get('/manage_user', [App\Http\Controllers\AdminController::class, 'manage_user']);
Route::get('/delete_user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user']);
Route::get('/edit_user/{id}', [App\Http\Controllers\AdminController::class, 'edit_user']);
//Route::put('/Update_user/{id}', [App\Http\Controllers\AdminController::class, 'Update_user']);
Route::post('/Update_user/{id}', [App\Http\Controllers\AdminController::class, 'Update_user']);
