<?php

namespace App\Http\Controllers;


use App\User;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function following_list(User $user)
    {
        return view('/user/following')->with([
            'user' => $user
            ]);
    }
    
    public function followed_list(User $user)
    {
        return view('/user/followed')->with([
            'user' => $user
            ]);
    }
    
    public function store(Request $request, User $user)
    {
        $input_following_id = Auth::id();
        $input_followed_id = $request->followed_id;
        
        $user = User::find($input_following_id);
        
        $user->follows()->attach($input_followed_id);
        
        return redirect('/user/'. $input_followed_id )->with([
            'user' => $user
            ]);
    }
    
    public function remove(Request $request, User $user)
    {
        $input_following_id = Auth::id();
        $input_followed_id = $request->followed_id;
        
        $user = User::find($input_following_id);
        
        $user->follows()->detach($input_followed_id);
        
        return redirect('/user/'. $input_followed_id )->with([
            'user' => $user
            ]);
    }
}
