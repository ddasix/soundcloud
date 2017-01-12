<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class Hashtag extends Model
{
    use InsertOnDuplicateKey;
    
    protected $table = "hashtags";
    public $timestamps = false;
    
}
