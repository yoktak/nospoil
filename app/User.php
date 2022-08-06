<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // usersテーブルとpostsテーブルを結合
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    // usersテーブルとcomicsテーブルを結合
    public function comics()
    {
        return $this->belongsToMany('App\Comic');
    }
    
    // usersテーブルとcommentsテーブルを結合
    public function comments()
    {
        return $this->belongsToMany('App\Comment');
    }
    
    // usersテーブルとfollowテーブルを結合
    // フォロワー>フォロー
    public function follows()
    {
        return $this->belongsToMany('App\User','follow','following_id','followed_id');
    }
    
    // フォロー>フォロワー
    public function followed()
    {
        return $this->belongsToMany('App\User','follow','followed_id','following_id');
    }
}
