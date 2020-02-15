<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PaperApiController extends Controller
{
    public function getAllMenu(){
		$data = \App\Models\Categories::select('name','slug','show_nav')->get()->keyBy('slug');
		$res = array('status'=>'success','res'=>$data->toArray());
		return response($res);
	}
	
	public function getcatwisepap(){
		$apidata = array('status'=>'failed');
		$data = \App\Models\CatPaper::select('id','paper_id','cat_id')->with('paperinfo','papercategory')->get();
		if($data->isNotEmpty()){
			$res = array();
			$data = $data->toArray();
			foreach($data as $item){
				if(!empty($item['papercategory'])){
					$paper = $item['paperinfo'];
					$papercategory = $item['papercategory'];
					if(isset($res[$item['papercategory']['slug']])){
						$res[$item['papercategory']['slug']]['data'][] = $paper;
					}else{
						$res[$item['papercategory']['slug']] = array('slug' => $papercategory['slug'],'name' =>$papercategory['name']);
						$res[$item['papercategory']['slug']]['data'][] = $paper;
					}
				}
			}
			ksort($res);
			$apidata = array('status'=>'success','res'=>$res);
		}
		return response($apidata);
	}
	
	public function getcategorydata($catname = ''){
		$res = array('status'=>'failed');
		if($catname!=''){
			$data = \App\Models\Categories::select('name','slug','id','description')
											->where('slug',$catname)
											->first();
			if(!empty($data)){
				$res['status'] = 'success';
				$res['res']= array('name' => $data->name,'slug' => $data->slug,'description' => $data->description);
				$res['res']['catdata'] = $this->getpaperdatabycat($data->id);
			}
		}
		return response($res);
	}
	
	protected function getpaperdatabycat($id){
		$data = \App\Models\PaperSize::select('name','slug','width','height')->where('cat_id',$id)->get();
		if($data->isNotEmpty()){
			return $data->toArray();
		}else{
			return array();
		}
	}
	
	protected function getallpapersize(){
		$res = array('status'=>'failed','res'=>array());
		$response = array();
		$data = \App\Models\PaperSize::select('slug','cat_id')->with('allcatname')->get();
		if($data->isNotEmpty()){
			$res['status'] = 'success';
			foreach($data->toArray() as $list){
				$url = '/'.$list['allcatname']['slug'].'/paper/'.$list['slug'];
				$catslug = '/'.$list['allcatname']['slug'];
				$response[$url] = $url;
				$response[$catslug] = $catslug;
			}
			$response['/'] = '/';
			$res['res'] = $response;
		}
		return response($res);
	}
	
	public function getpaper($catslug,$paperslug){
		$res = array('status'=>'failed','res'=>array());
		if($catslug!='' && $paperslug!=''){
			$result = \App\Models\PaperSize
				::join('categories', 'papersize.cat_id', '=', 'categories.id')
				->where('papersize.slug',$paperslug)
				->where('categories.slug',$catslug)
				->select('papersize.name', 'papersize.slug', 'papersize.width','papersize.height','papersize.description')
				->first();
			if(!empty($result)){
				$res['status'] = 'success';
				$res['res'] = $result->toArray();
			}
		}
		return $res;
	}
	
	public function getpage(){
		$res = array('status'=>'failed','res'=>array());
		$result = \App\Models\Page
			::select('name','slug')
			->where('status',1)
			->orderBy('order', 'asc')
			->get();
		if(!empty($result)){
			$res['status'] = 'success';
			$res['res'] = $result->toArray();
		}
		return response($res);
	}
	
	public function getPageContent($slug){
		$res = array('status'=>'failed','res'=>array());
		if($slug!=''){
			$result = \App\Models\Page
			::select('name','slug','content')
			->where('slug',$slug)
			->where('status',1)
			->first();
			if(!empty($result)){
				$res['status'] = 'success';
				$res['res'] = $result->toArray();
			}
		}
		return response($res);
	}
	
	public function getmeta(){
		$res = array('status'=>'failed','res'=>array());
		$data = array();
		$result = \App\Models\Setting
		::select('setting_name','setting_value')
		->whereIn('setting_name', array('logo', 'site_title', 'description','keywords'))
		->get();
		if(!empty($result)){
			$res['status'] = 'success';
			foreach($result->toArray() as $item){
				if($item['setting_name']=='logo'){
					$data[$item['setting_name']] = url('public/upload/'.$item['setting_value']);
				}else{
					$data[$item['setting_name']] = $item['setting_value'];
				}
			}
			$res['res'] = $data;
		}
		return response($res);
	}
}
