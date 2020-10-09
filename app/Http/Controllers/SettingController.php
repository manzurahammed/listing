<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Form;
use Auth;
class SettingController extends Controller
{
    
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(Auth::check() && Auth::user()->role!=1 || !Auth::check()){
                return redirect('/');
            }
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::select('id','setting_name','setting_value')->where('setting_name','<>','')->get()->keyBy('setting_name');
		$markup = $this->render($this->setField(),$settings->toArray());
        return view('setting.edit')->with(compact('settings','markup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setting_save(Request $request)
    {
		$field = $request->all();
		unset($field['_token']);
		foreach($field as $key => $item){
			if ($request->hasFile($key)) {
				$image = $request->file($key);
				$item = $this->file_handel($image);
				Setting::where('setting_name',$key)->update(['setting_value' => $item]);
			}else{
				Setting::where('setting_name',$key)->update(['setting_value' => $item]);
			}
		}
		
        $request->session()->flash('status',array('title'=>'Update Setting Data','type'=>'success'));
        return redirect('setting'); 
    }
	
	public function file_handel($image){
		$imageName = 'set_image'.rand().'.' . $image->getClientOriginalExtension();
		$destinationPath = public_path().'/upload';
		if($image->move($destinationPath,$imageName)){
			return $imageName;
		}
	}

    public function setField(){
        return array(
            array('name'=>'site_title','label'=>'Site Title','value'=>'','type'=>'text'),
            array('name'=>'copy_right','label'=>'Copy Right','value'=>'','type'=>'text'),
            array('name'=>'logo','label'=>'Logo','type'=>'file'),
			array('name'=>'description','label'=>'Description','value'=>'','type'=>'textarea'),
			array('name'=>'keywords','label'=>'Keywords','value'=>'','type'=>'textarea'),
        );
    }

    public function render($array,$sdata=array()){
        $markup = '';
        $data = '';
        if(!empty($array)){
            foreach($array as $key => $value){
                if(isset($sdata[$value['name']])){
                    $data = $sdata[$value['name']];
                }else{
					$data = '';
				}
                $markup .= $this->buildFiled($value,$data);
            }
        }
        return $markup;
    }

    public function buildFiled($value,$key){
        $markup = '';
        if($value['name']!='' && $value['type']!=''){
            $markup .= '<div class="form-group m-form__group row">';
                $name = $value['name'];
                $label = isset($value['label'])?$value['label']:$name;
                $markup .= ' <label class="col-lg-2 col-form-label">'.$label.'</label>';
                $ovalue = isset($key['setting_value'])?$key['setting_value']:'';
                $markup .= '<div class="col-lg-6">';
                    switch($value['type']){
                        case 'text':
                            $markup .= Form::text($name,$ovalue,array('class'=>'form-control m-input'));
                            break;
						case 'textarea':
                            $markup .= Form::textarea($name,$ovalue,array('class'=>'form-control m-input m-input--air'));
                            break;
                        case 'file':
                            $markup .= '<label class="custom-file">';
                                $markup .= Form::file($name,array('class'=>'custom-file-input'));
                                $markup .= '<span class="custom-file-control"></span>';
                            $markup .= '</label>';
                            break;
                        default: 
                    }
                $markup .= '</div>';
            $markup .= '</div>';
        }
        return $markup;
    }
    
}
