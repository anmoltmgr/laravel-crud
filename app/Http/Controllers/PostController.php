<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $validated['user_id'] = auth()->id();
        Post::create($validated);
        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $post->delete();
        return redirect('/')->with("Post deleted");
    }
}
