<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaperSize;
use App\Models\Categories;
use Validator;
Use Auth;
class PaperSizeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper_size = PaperSize::select('id','name','slug','width','height','cat_id')->with('catname')->paginate(20);
        return view('papersize.index')->with(compact('paper_size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_list = $this->get_cate();
        return view('papersize.create')->with(compact('cat_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name'      => 'bail|required|paps:cat,'.$request->get('category').'|max:30',
            'category'  => 'required|numeric',
            'width'     => 'required|numeric',
            'height'    => 'required|numeric',
        ])->validate();

        $paper_size = new PaperSize;
        $paper_size->name = $request->get('name');
        $paper_size->slug = $this->createSlug($request->get('name'));
        $paper_size->cat_id = $request->get('category');
        $paper_size->width = $request->get('width');
        $paper_size->height = $request->get('height');
		$paper_size->description = $request->get('description');
        if($paper_size->save()){
            $request->session()->flash('status',array('title'=>'Create New Paper SuccessFully','type'=>'success'));
            return redirect('papersize/'.$paper_size->id.'/edit');
        }
        $request->session()->flash('status',array('title'=>'Failed To Create Paper','type'=>'danger'));
        return redirect('papersize/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_list = $this->get_cate();
        $paper_size = PaperSize::findOrFail($id);
        return view('papersize.edit')->with(compact('cat_list','paper_size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' 		=> 'bail|required|max:30|paps:cat,'.$request->get('category').','.$id,
            'category'  => 'required|numeric',
            'width'     => 'required|numeric',
            'height'    => 'required|numeric',
        ])->validate();
        $paper_size = PaperSize::find($id);
        $paper_size->name = $request->get('name');
        $paper_size->slug = $this->createSlug($request->get('name'));
        $paper_size->cat_id = $request->get('category');
        $paper_size->width = $request->get('width');
        $paper_size->height = $request->get('height');
        $paper_size->description = $request->get('description');
        if($paper_size->save()){
            $request->session()->flash('status',array('title'=>'Update SuccessFully','type'=>'success'));
            return redirect('papersize/'.$paper_size->id.'/edit'); 
        }
        $request->session()->flash('status',array('title'=>'Failed To Update','type'=>'danger'));
        return redirect('papersize/'.$paper_size->id.'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $delete = PaperSize::destroy($id);
        if($delete){
            $request->session()->flash('status',array('title'=>'Delete SuccessFully','type'=>'success'));
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Delete','type'=>'danger'));
        }
        return redirect('papersize');
    }

    public function get_cate(){
        $cat = Categories::pluck('name','id');
        return $cat->all();
    }

    public function createSlug($str, $delimiter = '-'){
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;

    } 
}
