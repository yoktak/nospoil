<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
        'body', 'user_id', 'post_id',
    ];
    
    public function get()
    {
        return $this->orderBy('updated_at', 'DESC')->get();
    }
    
    // usersテーブルとcommentsテーブルを結合
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
