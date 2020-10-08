<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmarked extends Model
{
	public $timestamps = false;
    protected $table = 'bookmarked';
    
    public function ruser(){
        return $this->belongsTo('App\User','user_id')->select(array('id','name','image'));
    }
}
