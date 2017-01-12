<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    protected $table = "posts";
    
    public function Tags(){
        return $this->hasMany('App\Linkedtag', 'postid', 'id');
    }
    
    public function Comments(){
        return $this->hasMany('App\Comments', 'post_id', 'id');
    }
    
    public function Clips(){
        return $this->hasMany('App\Clips', 'post_id', 'id');
    }
    
    public function Likes(){
        return $this->hasMany('App\Likes', 'post_id', 'id');
    }
}
