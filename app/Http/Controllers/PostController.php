<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comic;
use App\Comment;
use App\Like;
use Storage;

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
    
    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        
        $input['user_id'] = Auth::id();
        
        $input_image = $request->file('image');
        if(isset($input_image))
        {
            $path = Storage::disk('s3')->putFile('photos', $input_image, 'public');
            $input['image_path'] = Storage::disk('s3')->url($path);
        }
        
        $post->fill($input)->save();

        
        return redirect('/posts');
    }
    
    public function show(Post $post, Comment $comment)
    {
        $like = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        return view('posts/show')->with([
            'post' => $post,
            'like' => $like,
            'comments' => Comment::where('post_id', $post->id)->get()
        ]);
    }
    
    public function edit(Post $post, User $user, Comic $comic)
    {
        
        if (Auth::id() == $post->user->id){
            return view('posts/edit')->with([
                'post' => $post->first(),
                'comics' => $comic->get()
                ]);   
        }
       
    }
    
    public function update(Request $request, Post $post)
    {
        $input = $request['post'];
        
        $input['user_id'] = Auth::id();
        
        $input_image = $request->file('image');
        if(isset($input_image))
        {
            $path = Storage::disk('s3')->putFile('photos', $input_image, 'public');
            $input['image_path'] = Storage::disk('s3')->url($path);
        }
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $delete_id = Post::find($post->id);
        $delete_id->delete();
        return redirect('/posts');
    }
}
