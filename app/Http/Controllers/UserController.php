<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
Use Auth;
use Illuminate\Support\Facades\File;
class UserController extends Controller {
   
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index(){
	   $users = User::select('id','name','email','status','image')->paginate(20);
	   return view('users.index')->with(compact('users'));
    }
   
   public function create(){
	   return view('users.create');
   }
   
   public function store(Request $request){
		Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg|max:256'
        ])->validate();
        $user = [
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'role' => $request->get('role'),
          'bio' => $request->get('bio'),
          'password' => bcrypt($request->get('password')),
          'status' => ($request->get('status')==1)?1:0
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/upload';
            if($image->move($destinationPath,$imageName)){
                $user['image'] = $imageName;
            }
        }
    
		$save = User::create($user);
		if($save){
            $request->session()->flash('status',array('title'=>'Create New User','type'=>'success'));
            return redirect('users');
        }
        $request->session()->flash('status',array('title'=>'Failed To Create User','type'=>'danger'));
        return redirect('users/create');
   }
   
   public function edit($id){
	   $users = User::findOrFail($id);
	   return view('users.edit',compact('users'));
   }
   
   public function update(Request $request, $id){
  		$validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'image' => 'mimes:jpeg,bmp,png,jpg|max:256',
            'role' => 'required'
        ];
  		if($request->get('password')!=''){
  			$validation['password'] = 'required|string|min:6|confirmed';
  		}
  		Validator::make($request->all(),$validation)->validate();
  		$user = User::find($id);
  		$user->name = $request->get('name');
  		$user->email = $request->get('email');
  		$user->role = $request->get('role');
  		$user->bio = $request->get('bio');
  		$user->status = ($request->get('status')==1)?1:0;
  		if($request->get('password')!=''){
  			$user->password = bcrypt($request->get('password'));
  		}
        if ($request->hasFile('image')) {
            $mainImg = $user->image;
            $image = $request->file('image');
            $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/upload';
            if($image->move($destinationPath,$imageName)){
                File::delete(public_path().'/upload/'.$mainImg);
                $user->image = $imageName;
            }
        }
  		if($user->save()){
            $request->session()->flash('status',array('title'=>'Update User Info','type'=>'success'));
            return redirect('users');
        }
        $request->session()->flash('status',array('title'=>'Failed To Update User Info','type'=>'danger'));
		return redirect('users/'.$user->id.'/edit');
   }


   
   public function destroy(Request $request,$id)
    {
        $delete = User::destroy($id);
        if($delete){
            $request->session()->flash('status',array('title'=>'Delete User SuccessFully','type'=>'success'));
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Delete','type'=>'danger'));
        }
        return redirect('users');
    }
	
	public function updatestatus(Request $request){
		$id = $request->get('id');
        $value = $request->get('value');
        $status = false;
        if($id>0){
            $status = User::where('id', $id)->update(['status' => $value]);
        }
        return response(array('status'=>$status));
	}

    public function logout(Request $request){
        Auth::logout();
	   $request->session()->invalidate();
    }
    public function profile(){
        $id = Auth::user()->id;
        $users = User::findOrFail($id);
        return view('users.profile',compact('users'));
    }

  public function profileUpdate(Request $request){
        $id = Auth::User()->id;
        $validation = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'image' => 'mimes:jpeg,bmp,png,jpg|max:256'
        ];
        if($request->get('password')!=''){
            $validation['password'] = 'required|string|min:6|confirmed';
        }
        Validator::make($request->all(),$validation)->validate();
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->bio = $request->get('bio');
        if($request->get('password')!=''){
            $user->password = bcrypt($request->get('password'));
        }
        if ($request->hasFile('image')) {
            $mainImg = $user->image;
            $image = $request->file('image');
            $imageName = 'image'.rand().'.' . $image->getClientOriginalExtension();
            $destinationPath = public_path().'/upload';
            if($image->move($destinationPath,$imageName)){
                File::delete(public_path().'/upload/'.$mainImg);
                $user->image = $imageName;
            }
        }
        if($user->save()){
            $request->session()->flash('status',array('title'=>'Profile Info Updated','type'=>'success'));
            return redirect('profile');
        }
        $request->session()->flash('status',array('title'=>'Failed To Update Profile Info','type'=>'danger'));
        return redirect('profile');
  }
  
}
