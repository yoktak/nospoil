<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    // usersテーブルとcomicsテーブルを結合
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
