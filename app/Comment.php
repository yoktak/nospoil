<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // usersテーブルとcommentsテーブルを結合
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
