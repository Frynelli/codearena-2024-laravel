<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');

Route::get('/post/{post:slug}', [PostController::class, 'show'])
    ->name('post');

Route::get('/author/{user}', [PostController::class, 'authors'])
    ->name('author');
