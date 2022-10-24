<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use App\User;
use App\Comic;
use App\Comment;
use App\Like;
use Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post, User $user)
    {
        $comicAuth = Auth::user()->comics;
        return view('posts/index')->with([
            'posts' => $post->get(),
            'comics' => $comicAuth->get()
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
        $userAuth = Auth::user();
        $defaultLiked = Like::where('user_id', $userAuth->id)->where('post_id', $post->id)->first();
        //いいねしたかどうか判別
        if ($defaultLiked == null) {
            $defaultLiked = false;
        }
        else {
            $defaultLiked = true;
        }
        $defaultCount = $post->likes()->count();
        return view('posts/show')->with([
            'post' => $post,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount,
            'comments' => Comment::where('post_id', $post->id)->get()
        ]);
    }
    
    public function edit(Post $post, User $user, Comic $comic)
    {
            return view('posts/edit')->with([
                'post' => $post,
                'comics' => $comic->get()
                ]);   
       
    }
    
    public function update(PostRequest $request, Post $post)
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
