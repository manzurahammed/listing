<?php

namespace App\Http\Controllers\frontend;


use App\Models\Amenties;
use App\Models\ListingTime;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\City;
use Illuminate\Support\Facades\Log;
use Validator;
Use Auth;

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
		
		$listing = [
			'title' => $request->get( 'title' ),
			'email' => $request->get( 'email' ),
			'latitude' => $request->get( 'latitude' ),
			'longitude' => $request->get( 'longitude' ),
			'cat_id' => $request->get( 'cat_id' ),
			'city_id' => $request->get( 'city_id' ),
			'phone' => $request->get( 'phone' ),
			'website' => $request->get( 'website' ),
			'description' => $request->get( 'description' ),
			'video_url' => $request->get( 'video_url' ),
			'created_by' => Auth::user()->id,
			'update_by' => Auth::user()->id,
			'status' => 0
		];
		
		if ( $request->hasFile( 'feature_image' ) ) {
			$image = $request->file( 'feature_image' );
			$imageName = 'feature_' . rand() . '.' . $image->getClientOriginalExtension();
			$destinationPath = public_path() . '/feature_image';
			if ( $image->move( $destinationPath, $imageName ) ) {
				$listing[ 'feature_image' ] = $imageName;
			}
		}
		
		if ( $request->hasFile( 'gallery_image' ) ) {
			$gallery_images = [];
			foreach ( $request->file( 'gallery_image' ) as $file ) {
				$imageName = 'gallery_' . rand() . '.' . $file->getClientOriginalExtension();
				$destinationPath = public_path() . '/gallery_image';
				if ( $file->move( $destinationPath, $imageName ) ) {
					$gallery_images[] = '/gallery_image/' . $imageName;
				}
			}
			$listing[ 'gallery_image' ] = json_encode( $gallery_images );
		}
		
		$save = Listing::create( $listing );
		
		if ( $save ) {
			$this->save_listing_time( $save->id, $request );
			$this->save_listing_amenities( $save->id, $request );
			$request->session()->flash( 'status', array( 'title' => 'Create New Listing', 'type' => 'success' ) );
			return redirect( 'listing' );
		}
		$request->session()->flash( 'status', array( 'title' => 'Failed To Create Listing', 'type' => 'danger' ) );
		return redirect( 'addListing' );
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
	
	public function save_listing_time( $listing_id, $request ){
		ListingTime::where('listing_id', $listing_id)->delete();
	}
	
	public function save_listing_amenities( $listing_id, $request ){
		Amenties::where('listing_id', $listing_id )->delete();
	}
	
}
