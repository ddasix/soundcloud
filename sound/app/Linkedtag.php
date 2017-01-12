<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linkedtag extends Model
{
    protected $table = "linkedtags";
    public $timestamps = false;
    
    public function Posts(){
        return $this->belongsTo('App\Post', 'id', 'postid');
    }
        
    public function Tags(){
        return $this->belongsTo('App\Hashtag', 'tagid', 'id');
    }
}
