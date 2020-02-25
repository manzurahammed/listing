<?php

namespace App\Http\Controllers\frontend;


use App\Models\Amenties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\City;
use Illuminate\Support\Facades\Log;
use Validator;
Use Auth;
use Illuminate\Support\Facades\File;

class ListingController extends Controller {
	public function addListing () {
		
		$days = [ 'saturday', 'sunday', 'monday', 'Tuesday', 'wednesday', 'thursday', 'friday' ];
		
		return view( 'frontend.dashboard.add' )->with( [
			'categories' => $this->getAllCategory(),
			'cities' => $this->getAllCity(),
			'amenities' => $this->getAmenities(),
			'days' => $days
		] );
	}
	
	public function savelisting ( Request $request ) {
		Validator::make( $request->all(), [
			'title' => 'required',
			'email' => 'required',
			'latitude' => 'required',
			'longitude' => 'required',
			'cat_id' => 'required',
			'city_id' => 'required',
			'feature_image' => 'required|image|mimes:jpeg,png,jpg'
		] )->validate();
		
		
	}
	
	public function getAllCategory () {
		return $categories = Categories::pluck( 'name', 'id' )->all();
	}
	
	public function getAllCity () {
		return $categories = City::pluck( 'name', 'id' )->all();
	}
	
	public function getAmenities () {
		return $categories = Amenties::select( 'name', 'id' )->get();
	}
	
}
