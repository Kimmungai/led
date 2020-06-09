<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function tags()
    {
      return $this->hasMany('App\Tag');
    }
    public function categories()
    {
      return $this->hasMany('App\Category');
    }
    public function likes()
    {
      return $this->hasMany('App\Like');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function user()
    {
      return $this->belongsTo('App\User','publisher');
    }
}
