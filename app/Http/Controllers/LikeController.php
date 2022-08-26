<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store_show(Request $request, Post $post)
    {
        $user = Auth::user();
        $input_post = $request->post_id;
        $user->likes()->attach($input_post);
        
        return redirect('/posts/' . $post->id);
    }
    
    public function remove_show(Request $request, Post $post)
    {
        $user = Auth::user();
        $input_post = $request->post_id;
        $user->likes()->detach($input_post);
        
        return redirect('/posts/' . $post->id);
    }
    
    public function store_posts(Request $request, Post $post)
    {
        $user = Auth::user();
        $input_post = $request->post_id;
        $user->likes()->attach($input_post);
        
        return redirect('/posts');
    }
    
    public function remove_posts(Request $request, Post $post)
    {
        $user = Auth::user();
        $input_post = $request->post_id;
        $user->likes()->detach($input_post);
        
        return redirect('/posts');
    }
}
