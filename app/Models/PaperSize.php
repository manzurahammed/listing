<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PaperSize extends Model
{
    use SoftDeletes;
    protected $table = 'papersize';

    public function catname(){
        return $this->belongsTo('App\Models\Categories','cat_id')->select(array('id','name'));
    }
	public function allcatname(){
        return $this->belongsTo('App\Models\Categories','cat_id')->select(array('id','slug'));
    }
}
