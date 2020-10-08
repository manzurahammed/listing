<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
Use Auth;
use Illuminate\Support\Facades\File;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(!Auth::check() && Auth::user()->role!=1){
                return redirect('/');
            }
            return $next($request);
        });
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
		$categories = Categories::select('id','name','slug','show_nav')->paginate(20);
        return view('category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return view('category.create');
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
		$categories = new Categories;
        $categories->name = $request->get('name');
        $categories->slug = $this->createSlug($request->get('name'));
        $categories->show_nav = ($request->get('show_nav')=='on')?1:0;
        $categories->description = $request->get('description');
	
	    if ($request->hasFile('image')) {
		    $image = $request->file('image');
		    $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
		    $destinationPath = public_path().'/upload/cat_image';
		    if($image->move($destinationPath,$imageName)){
			    $categories['image'] = $imageName;
		    }
	    }
    
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $imageName = 'icon'.rand().'.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/upload/cat_image';
            if($image->move($destinationPath,$imageName)){
                $categories['icon'] = $imageName;
            }
        }
        
        if($categories->save()){
            $request->session()->flash('status',array('title'=>'Create Category SuccessFully','type'=>'success'));
            return redirect('categories/'.$categories->id.'/edit'); 
        }
        $request->session()->flash('status',array('title'=>'Failed To Create Category','type'=>'danger'));
        return redirect('categories/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Categories::findOrFail($id);
        return view('category.edit',compact('categories'));
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
        $categories = Categories::find($id);
        $categories->name = $request->get('name');
        $categories->slug = $this->createSlug($request->get('name'));
        $categories->show_nav = ($request->get('show_nav')==1)?1:0;
        $categories->description = $request->get('description');
	
	    if ($request->hasFile('image')) {
		    $mainImg = $categories->image;
		    $image = $request->file('image');
		    $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
		    $destinationPath = public_path().'/upload/cat_image';
		    if($image->move($destinationPath,$imageName)){
			    File::delete(public_path().'/upload/cat_image/'.$mainImg);
			    $categories->image = $imageName;
		    }
	    }
    
        if ($request->hasFile('icon')) {
            $mainImg = $categories->icon;
            $image = $request->file('icon');
            $imageName = 'icon'.rand().'.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/upload/cat_image';
            if($image->move($destinationPath,$imageName)){
                File::delete(public_path().'/upload/cat_image/'.$mainImg);
                $categories->icon = $imageName;
            }
        }
        
        if($categories->save()){
            $request->session()->flash('status',array('title'=>' Category Update SuccessFully','type'=>'success'));
            return redirect('categories/'.$categories->id.'/edit'); 
        }
        $request->session()->flash('status',array('title'=>'Failed To Update','type'=>'danger'));
        return redirect('categories/'.$categories->id.'/edit'); 
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = Categories::destroy($id);
        if($delete){
            $request->session()->flash('status',array('title'=>'Delete Category SuccessFully','type'=>'success'));
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Delete','type'=>'danger'));
        }
        return redirect('categories'); 
    }
	
	public function createSlug($str, $delimiter = '-'){
		return strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
	}

    public function show_nav(Request $request){
        $id = $request->get('id');
        $value = $request->get('value');
        $status = false;
        if($id>0){
            $status = Categories::where('id', $id)->update(['show_nav' => $value]);
        }
        return response(array('status'=>$status));
    }
}
