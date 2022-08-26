<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table='posts';
    protected $fillable = [
        'user_id', 'image_path', 'comic_id','body','type','episode'
    ];
    
    
    public function get()
    {
        return $this->orderBy('updated_at', 'DESC')->get();
    }
    
    // usersテーブルとpostsテーブルを結合
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comic()
    {
        return $this->belongsTo('App\Comic');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id');
    }
}
