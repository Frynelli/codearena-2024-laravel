<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    

    public function store(Post $post)
    {
        
        $data = request()->validate([
            'name' => 'required',
            'body' => 'required',
        ]);
        
        $data['user_id'] = auth()->check() ? auth()->id() : null;
        $data['post_id'] = $post->id;
        
        $post->comments()->create($data);
        
        return redirect()->route('post', $post->slug)
            ->with('success', 'Comment added successfully');
    }
}
