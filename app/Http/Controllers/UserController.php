<?php

namespace App\Http\Controllers;

use App\User;
use App\Comic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user/index');
    }
    
    public function create(User $user, Comic $comic)
    {
        return view('user/create')->with([
            'user' => $user->get(),
            'comics'=>$comic->get()
            ]);
    }
    
    public function store(Comic $comic, Request $request)
    {
        $input_comics = $request->comic_id; 
        $input_type = $request->type;
        $input_episode = $request->episode;
        
        $user=Auth::user();
        //attachメソッドを使って中間テーブルにデータを保存
        $user->comics()->attach($input_comics, ["type" => $input_type,"episode" => $input_episode]);
        
        return redirect('/user')->with([
            'user' => $user->get(),
            'comics'=>$comic->get()
        ]);
    }
    
    public function edit(User $user, Comic $comic)
    {
        return view('user/edit')->with([
            'user' => $user->get(),
            'comics'=>$comic->get()
        ]);
    }
    
    public function update(Request $request, Comic $comic)
    {   
        $input_user = $request['user'];
        $input_comics = $request->comic_id;  //comics_arrayはnameで設定した配列名
        $input_type = $request->type;
        $input_episode = $request->episode;
        
        
        $user=Auth::user();
        
        //先にusersテーブルにデータを保存
        $user->fill($input_user)->save();
        //attachメソッドを使って中間テーブルにデータを保存
        $user->comics()->attach($input_comics,['type' => $input_type,'episode' => $input_episode]); 
        
        
        
        return redirect('/user')->with([
            'user' => $user->get(),
            'comics'=>$comic->get()
        ]);
        
        // return redirect()->action('UserController@index');
         
    }
    
    

}
