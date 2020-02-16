<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
Use Auth;
use Illuminate\Support\Facades\File;
use App\Models\City;
class CityController extends Controller
{
	
	public function __construct(){
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
	    $cities = City::select('id','name','slug','show_nav')->paginate(20);
        return view('city.index')->with(compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
		    'name' => 'required|unique:categories'
		])->validate();
		$cities = new City;
	    $cities->name = $request->get('name');
	    $cities->slug = $this->createSlug($request->get('name'));
	    $cities->show_nav = ($request->get('show_nav')=='on')?1:0;
     
	
	    if ($request->hasFile('image')) {
		    $image = $request->file('image');
		    $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
		    $destinationPath = public_path().'/upload/city_image';
		    if($image->move($destinationPath,$imageName)){
			    $cities['image'] = $imageName;
		    }
	    }
        
        if($cities->save()){
            $request->session()->flash('status',array('title'=>'Create City SuccessFully','type'=>'success'));
            return redirect('cities/'.$cities->id.'/edit'); 
        }
        $request->session()->flash('status',array('title'=>'Failed To Create City','type'=>'danger'));
        return redirect('cities/create');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cities = City::findOrFail($id);
        return view('city.edit',compact('cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'.$id
        ])->validate();
        $cities = City::find($id);
        $cities->name = $request->get('name');
        $cities->slug = $this->createSlug($request->get('name'));
        $cities->show_nav = ($request->get('show_nav')==1)?1:0;
        
	
	    if ($request->hasFile('image')) {
		    $mainImg = $cities->image;
		    $image = $request->file('image');
		    $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
		    $destinationPath = public_path().'/upload/city_image';
		    if($image->move($destinationPath,$imageName)){
			    File::delete(public_path().'/upload/city_image/'.$mainImg);
			    $cities->image = $imageName;
		    }
	    }
        
        
        if($cities->save()){
            $request->session()->flash('status',array('title'=>' City Update SuccessFully','type'=>'success'));
            return redirect('cities/'.$cities->id.'/edit'); 
        }
        $request->session()->flash('status',array('title'=>'Failed To Update','type'=>'danger'));
        return redirect('cities/'.$cities->id.'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = City::destroy($id);
        if($delete){
            $request->session()->flash('status',array('title'=>'Delete City SuccessFully','type'=>'success'));
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Delete','type'=>'danger'));
        }
        return redirect('cities');
    }
	
	public function createSlug($str, $delimiter = '-'){
		return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
		
	}

    public function city_show_nav(Request $request){
        $id = $request->get('id');
        $value = $request->get('value');
        $status = false;
        if($id>0){
            $status = City::where('id', $id)->update(['show_nav' => $value]);
        }
        return response(array('status'=>$status));
    }
}
