<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comic;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // public function index(Post $post, Comment $comment)
    // {
    //     return view('/posts/show')->with([
    //         'post' => $post,
    //         'comments' => $comment->get()
    //         ]);
    // }
    
    public function create(Post $post)
    {
        return view('/comments/create')->with(['post' => $post]);
    }
    
    public function store(Request $request, User $user, Post $post, Comment $comment)
    {
        $input = $request['comment'];
        $input['user_id'] = Auth::id();
        $comment->fill($input)->save();
        
        
        return redirect('/posts/' . $post->id );
    }
}
