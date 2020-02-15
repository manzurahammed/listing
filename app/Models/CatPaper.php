<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPaper extends Model
{
    protected $table = 'catpaper';
	
	public function paperinfo(){
        return $this->belongsTo('App\Models\PaperSize','paper_id')->select(array('id','name','slug','width','height'));
    }
	public function papercategory(){
        return $this->belongsTo('App\Models\Categories','cat_id')->select(array('id','name','slug'))->where('show_nav',1);
    }
}
