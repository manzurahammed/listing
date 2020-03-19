<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
Use Auth;
use Validator;
class DashboardController extends Controller {
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index () {
		return view( 'frontend.dashboard.dashboard' );
	}
	
	public function editProfile () {
        $id = Auth::user()->id;
        $users = User::findOrFail($id);
        Log::info($users);
		return view( 'frontend.dashboard.profile' )->with( [
            'users' => $users
        ] );
	}
	
	public function updateProfile(Request $request, $id){
        
        Validator::make( $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'image' => 'mimes:jpeg,bmp,png,jpg|max:256'
        ] )->validate();
        
        $user = ( new \App\User )->find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->bio = $request->get('bio');
        
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
        }else{
            $request->session()->flash('status',array('title'=>'Failed To Update User Info','type'=>'danger'));
        }
        return redirect('listing/profile');
    }
	
}
