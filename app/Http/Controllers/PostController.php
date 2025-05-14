<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->latest()->get();

        return view('index', compact('posts'));
    }

    public function showCreatePostForm(){
        return view('createPost');
    }

    public function createPost(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => Auth::getUser()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Post creado correctamente.');
    }

}
