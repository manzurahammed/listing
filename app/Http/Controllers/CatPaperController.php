<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaperSize;
use App\Models\Categories;
use App\Models\CatPaper;
use Validator;
Use Auth;
class CatPaperController extends Controller
{
    
	public function __construct(){
        $this->middleware('auth');
    }

     public function index()
    {	$cat_list = array(0 => 'Select Category');
        $cat_list = $cat_list + $this->get_cate();
        return view('catpaper.create')->with(compact('cat_list'));
    }

    public function store(Request $request){
    	Validator::make($request->all(), [
		    'category' => 'required|numeric',
		    'catpaper' => 'required|array|min:1',
		])->validate();
		$data = array();
		if(!empty($request->get('catpaper'))){
			$cat_id = $request->get('category');
			CatPaper::where('cat_id',$cat_id)->delete();
			foreach ($request->get('catpaper') as $key => $value) {
				$data[$key]['paper_id'] = $value;
				$data[$key]['cat_id'] = $cat_id;
				$data[$key]['created_at'] =  date('Y-m-d H:i:s');
				$data[$key]['updated_at'] =  date('Y-m-d H:i:s');
			}
			$save = CatPaper::insert($data);
			if($save){
				$request->session()->flash('status',array('title'=>'Save Data successFully','type'=>'success'));
			}else{
				$request->session()->flash('status',array('title'=>'Save Data successFully','type'=>'danger'));
			}
			return redirect('catpaper');
		}
    }

    public function get_cate(){
        $cat = Categories::where('show_nav',1)->pluck('name','id');
        return $cat->all();
    }

    public function paperlist(Request $request){
    	$cat_list = $paper = array();
    	$id = $request->get('id');
    	if($id>0){
			$cat_list = PaperSize::where('cat_id',$id)->pluck('name','id');
			$paper = CatPaper::where('cat_id',$id)->pluck('paper_id');
    	}
    	return view('catpaper.paper')->with(compact('cat_list','paper'));
    }
}
