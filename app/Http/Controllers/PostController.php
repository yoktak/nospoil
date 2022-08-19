<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comic;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post, User $user)
    {
        return view('posts/index')->with([
            'posts' => $post->get()
            ]);
    }
    
    public function create(User $user, Comic $comic)
    {
        return view('posts/create')->with([
            'user'=>$user->get(),
            'comics'=>$comic->get()
        ]); 
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        
        
        return redirect('/');
    }
}
