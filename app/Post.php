<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function get()
    {
        return $this->orderBy('updated_at', 'DESC')->get();
    }
    
    // usersテーブルとpostsテーブルを結合
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
