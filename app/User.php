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
    protected $table='users';
    protected $fillable = [
        'name', 'profile', 'email', 'password',
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
        return $this->belongsToMany('App\Comic')
                    ->using('App\ComicUser')
                    ->withPivot('type','episode');
    }
    
    // usersテーブルとcommentsテーブルを結合
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    // usersテーブルとfollowテーブルを結合
    // フォロワー>フォロー
    public function follows()
    {
        return $this->belongsToMany('App\User','follow','following_id','followed_id')
                    ->using('App\Follow');
    }
    
    // フォロー>フォロワー
    public function followed()
    {
        return $this->belongsToMany('App\User','follow','followed_id','following_id');
    }
    
    public function filters()
    {
        return $this->hasMany('App\ComicUser');
    }
    
    //いいね機能
    //多対多のリレーション
    public function likes()
    {
        return $this->belongsToMany('App\Post','likes','user_id','post_id');
    }
    // //この投稿に対して既にいいねしてあるか判別
    // public function islike($postId)
    // {
    //     return $this->likes()->where('post_id',$postId)->exists();
    // }
    // //islike()の有無で分岐
    // public function like($postId)
    // {
    //   if($this->isLike($postId)){
    //     $this->likes()->detach($postId);
    //   } else {
    //     $this->likes()->attach($postId);
    //   }
    // }
}
