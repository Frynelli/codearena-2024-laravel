<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->whereNotNull('image')
        ->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post = null)
    {
         if (is_null($post) || is_null($post->published_at)){
            abort(404);
         } 
        return view('posts.show', compact('post'));
    }
}
