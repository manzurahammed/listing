<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table   = 'listing';
    public function catname(){
        return $this->belongsTo('App\Models\Categories','cat_id')->select(array('id','name','image'));
    }
    public function ruser(){
        return $this->belongsTo('App\User','created_by')->select(array('id','name','image','email'));
    }
}
