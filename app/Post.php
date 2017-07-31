<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }



}