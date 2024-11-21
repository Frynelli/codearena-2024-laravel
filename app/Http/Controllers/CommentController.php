<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    

    public function store(Post $post)
    {
        $data = request()->validate([
            'name' => 'required',
            'body' => 'required',
        ]);

        $data['user_id'] = auth()->check() ? auth()->id() : null;

        $post->comments()->create($data);
        


    }
}
