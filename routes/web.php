<?php

use App\Models\friend;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    session()->forget(['id', 'username']);
    
    return view("login");
});

Route::post('logauth', function () {
    if (User::loginAuthentication()) {
        return view("home", [
            'posts' => Post::findAll()
        ]);
    } else {
        return view("login");
    }
});

Route::post('follow', function () {
    friend::addFriend();

    return view("home", [
        'posts' => Post::findAll()
    ]);
});

Route::post('post', function () {
    Post::createPost();

    return view("home", [
        'posts' => Post::findAll()
    ]);
});

Route::get('home', function () {
    if (session()->has('id')) {
        return view("home", [
            'posts' => Post::findAll()
        ]);
    } else {
        return view('login');
    }
});
