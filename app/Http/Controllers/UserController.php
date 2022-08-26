<?php

namespace App\Http\Controllers;

use App\User;
use App\Comic;
use App\ComicUser;
use App\Post;
use App\Follow;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user/index');
    }
    
    
    public function edit_profile(User $user)
    {
        return view('user/edit_profile')->with([
            'user' => $user->get()
        ]);
    }
    
     public function edit_comic(User $user, Comic $comic)
    {
        return view('user/edit_comic')->with([
            'user' => $user->get(),
            'comics' => $comic->get()
        ]);
    }
    
    public function update_profile(UserRequest $request)
    {   
        $input_user = $request['user'];
       
        $user=Auth::user();

        $user->fill($input_user)->save();
        
        return redirect('/user')->with([
            'user' => $user->get()
        ]);
         
    }
    
    public function update_comic(Request $request, Comic $comic)
    {   
        $input_comics = $request->comic_id;  
        $input_type = $request->type;
        $input_episode = $request->episode;
        $user=Auth::user();
        
        $filter = ComicUser::where('user_id', $user->id)->where("comic_id", $input_comics)->where('type', $input_type)->first();
        
        if (isset($filter)) {
            $filter['episode'] = $input_episode;
            $filter->save();
        } else {
            $user->comics()->attach($input_comics, ['type' => $input_type, 'episode' => $input_episode]);
        }
       
        return redirect('/user')->with([
            'user' => $user->get(),
            'comics' => $comic->get()
        ]);
         
    }
    
    public function show(Post $post, User $user)
    {
        $follow = Follow::where('following_id', Auth::id())
                        ->where('followed_id', $user->id)->first();
        
        return view('user_other/index')->with([
            'post' => $post,
            'user' => $user,
            'follow' => $follow
            ]);
    }
    
}
