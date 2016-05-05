<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMetaData extends Model{
    protected $table = 'post_meta_data';
    
    public function author(){
    	return $this->hasOne('App\User', 'id', 'author_id');
    }
   
}
