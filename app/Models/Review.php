<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	public $timestamps = false;
    protected $table = 'review';
    
    public function ruser(){
        return $this->belongsTo('App\User','user_id')->select(array('id','name','image'));
    }
}
