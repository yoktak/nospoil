<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $input_user = $request->user_id;
        $input_post = $post->id;
        $like = Like::create(['user_id' => $input_user, 'post_id' => $input_post]);
        $likeCount = $post->likes()->count();
        return response()->json([
                                'likeCount' => $likeCount]);
    }
    
    public function remove(Request $request, Post $post)
    {
        $input_user = $request->user_id;
        $input_post = $post->id;
        $unlike = Like::where('user_id', $input_user)->where('post_id', $input_post)->first();
        $unlike->delete();
        $likeCount = $post->likes()->count();
        return response()->json([
                                'likeCount' => $likeCount]);
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
