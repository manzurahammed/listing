<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Validator;
use Auth;
class PageController extends Controller
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
        $page_list = Page::select('id','name','slug','order','status')->paginate(20);
        return view('page.index')->with(compact('page_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$slug = $this->getslug($request);
		$request->merge(['slug' => $slug]);
		$validation = [
            'name' => 'bail|required|unique:page',
            'slug' => 'slug_unique'
        ];
  		Validator::make($request->all(),$validation)->validate();
		$page = new Page;
        $page->name = $request->get('name');
        $page->slug = $request->get('slug');
        $page->content = $request->get('content');
        $page->status = ($request->get('status')=='on')?1:0;
        $page->order = ($request->get('order')!='')?$request->get('order'):10;
        if($page->save()){
            $request->session()->flash('status',array('title'=>'Create Page Successfully','type'=>'success'));
            return redirect('pages/'.$page->id.'/edit');
        }
        $request->session()->flash('status',array('title'=>'Failed To Create Page','type'=>'danger'));
        return redirect('pages/create');
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
        $pages = Page::findOrFail($id);
        return view('page.edit',compact('pages'));
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
		$slug = $this->getslug($request);
		$request->merge(['slug' => $slug]);
        Validator::make($request->all(), [
            'name' => 'required|unique:page,name,'.$id,
            'slug' => 'slug_unique:slug,'.$id
        ])->validate();
        $pages = Page::find($id);
        $pages->name = $request->get('name');
        $pages->slug = $request->get('slug');
		$pages->status = ($request->get('status')=='on')?1:0;
        $pages->order = ($request->get('order')!='')?$request->get('order'):10;
        $pages->content = $request->get('content');
        if($pages->save()){
            $request->session()->flash('status',array('title'=>' Page Update SuccessFully','type'=>'success'));
            return redirect('pages/'.$pages->id.'/edit');
        }
        $request->session()->flash('status',array('title'=>'Failed To Update','type'=>'danger'));
        return redirect('pages/'.$pages->id.'/edit'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Page::destroy($id);
        if($delete){
            $request->session()->flash('status',array('title'=>'Delete Page SuccessFully','type'=>'success'));
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Delete','type'=>'danger'));
        }
        return redirect('pages'); 
    }
	
	private function getslug($arr){
		$slug = $arr->get('name');
		$delimiter = '-';
		$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $slug))))), $delimiter));
		if($arr->get('slug')!=''){
			$delimiter = '-';
			$slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $arr->get('slug')))))), $delimiter));
		}
		return $slug;
	}
	
	public function pagestatus(Request $request){
        $id = $request->get('id');
        $value = $request->get('value');
        $status = false;
        if($id>0){
            $status = Page::where('id', $id)->update(['status' => $value]);
        }
        return response(array('status'=>$status));
    }
}
