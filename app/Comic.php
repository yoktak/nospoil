<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $table='comics';
    // protected $fillable = [
    //     'id','title', 'author', 'magazine',
    // ];
    // usersテーブルとcomicsテーブルを結合
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
