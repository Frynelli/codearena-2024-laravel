<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(User $user = null)
    {
        // posts να έχουν αυτά τα κριτήρια για να εμφανιστούν
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->whereNotNull('published_at')
        ->whereNotNull('image')
        ->orderByDesc('published_at')
        ->paginate(12);

        $authors = User::whereHas('posts',function ($query){
            $query->whereNotNull('published_at');
            })
            ->orderBy('id')
            ->get();
        
        return view('posts.index', compact('posts','authors'));
    }

    public function show(Post $post = null)
    {
         if (is_null($post) || is_null($post->published_at)){
            abort(404);
         } 
         
        return view('posts.show', compact('post'));
    }
    
    public function authors(User $user)
    {
        $posts = Post::where('user_id', $user->id)
        ->whereNotNull('published_at')
        ->orderBy('published_at', 'desc')
        ->paginate(12);

        if($posts->isEmpty())
        {
            abort(404);
        }
            
        return view('posts.author', compact('user','posts'));
    }
}
