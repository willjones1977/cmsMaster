<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
   	public $timestamps = false; 
   	 public function postMetaData(){
    	return $this->hasOne('App\PostMetaData', 'post_id', 'id');
    
    }
}
