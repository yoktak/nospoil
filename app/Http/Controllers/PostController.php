<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // return User::find(1)->follows;
        return view('posts/index')->with(['posts' => $post->get()]);
    }
}
