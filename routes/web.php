<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/promoted', [PostController::class, 'promoted'])
    ->name('promoted');

Route::post('/post/{post:slug}/comment', [CommentController::class, 'store'])->withoutMiddleware(['auth'])
    ->name('comment');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comment.delete');