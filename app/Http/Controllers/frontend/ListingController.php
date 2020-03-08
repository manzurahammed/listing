<?php

namespace App\Http\Controllers\frontend;


use App\Models\Amenties;
use App\Models\ListingTime;
use App\Models\ListingAmenties;
use App\Models\Listing;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\City;
use Illuminate\Support\Facades\Log;
use Validator;
Use Auth;

class ListingController extends Controller
{
    
    public function viewListing()
    {
        $listing = Listing::paginate( 20 );
        return view( 'frontend.dashboard.listing' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function activeListing()
    {
        $listing = Listing::where( 'status', 1 )
            ->whereDate( 'validation_date', '>=', date( 'Y-m-d' ) )
            ->paginate( 20 );
        return view( 'frontend.dashboard.active_listing' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function pendingListing()
    {
        $listing = Listing::where( 'status', 0 )->paginate( 20 );
        return view( 'frontend.dashboard.pending_listing' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function expiredListing()
    {
        $listing = Listing::whereDate( 'validation_date', '<', date( 'Y-m-d' ) )
            ->paginate( 20 );
        return view( 'frontend.dashboard.expired_listing' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function bookmarked()
    {
        $listing = Listing::whereDate( 'validation_date', '<', date( 'Y-m-d' ) )
            ->paginate( 20 );
        return view( 'frontend.dashboard.bookmarked' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function review()
    {
        $listing = Listing::whereDate( 'validation_date', '<', date( 'Y-m-d' ) )
            ->paginate( 20 );
        return view( 'frontend.dashboard.bookmarked' )->with( [
            'listing' => $listing
        ] );
    }
    
    public function addListing()
    {
        
        $days = ['saturday', 'sunday', 'monday', 'Tuesday', 'wednesday', 'thursday', 'friday'];
        
        return view( 'frontend.dashboard.add' )->with( [
            'categories' => $this->getAllCategory(),
            'cities'     => $this->getAllCity(),
            'amenities'  => $this->getAmenities(),
            'days'       => $days,
        
        ] );
    }
    
    public function editListing( $id )
    {
        $days = ['saturday', 'sunday', 'monday', 'Tuesday', 'wednesday', 'thursday', 'friday'];
        $social_name = [
            'facebook'  => 'facebook',
            'twitter'   => 'twitter',
            'linkedin'  => 'linkedin',
            'instagram' => 'instagram',
            'pinterest' => 'pinterest'
        ];
        
        return view( 'frontend.dashboard.edit' )->with( [
            'categories'         => $this->getAllCategory(),
            'cities'             => $this->getAllCity(),
            'amenities'          => $this->getAmenities(),
            'selected_amenities' => $this->getSelectedAmenities( $id ),
            'days'               => $days,
            'selected_time'      => $days,
            'social_name'        => $social_name,
            'listing'            => Listing::find( $id )
        ] );
    }
    
    public function getSelectedAmenities( $id )
    {
        $data =  ListingAmenties::select( 'amenities_id' )->where( 'listing_id', $id )->get();
        return array_pluck($data->toArray(),'amenities_id');
        
    }
    
    public function updateListing( Request $request, $id )
    {
        Validator::make( $request->all(), [
            'title'         => 'required',
            'email'         => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'cat_id'        => 'required',
            'city_id'       => 'required'
        ] )->validate();
        
        $Listing_data = Listing::find($id);
    
        $Listing_data->title =  $request->get( 'title' );
        $Listing_data->email =  $request->get( 'email' );
        $Listing_data->latitude =  $request->get( 'latitude' );
        $Listing_data->longitude =  $request->get( 'longitude' );
        $Listing_data->cat_id =  $request->get( 'cat_id' );
        $Listing_data->city_id =  $request->get( 'city_id' );
        $Listing_data->phone =  $request->get( 'phone' );
        $Listing_data->phone =  $request->get( 'phone' );
        $Listing_data->website =  $request->get( 'website' );
        $Listing_data->description =  $request->get( 'description' );
        $Listing_data->video_url =  $request->get( 'video_url' );
        $Listing_data->update_by =  Auth::user()->id;
        $Listing_data->validation_date =  date( 'Y-m-d', strtotime( "+7 day" ) );
        $Listing_data->status =  0;
    
    
        if ( $request->hasFile( 'feature_image' ) ) {
            $image = $request->file( 'feature_image' );
            $imageName = 'feature_' . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/feature_image';
            if ( $image->move( $destinationPath, $imageName ) ) {
                $Listing_data->feature_image = $imageName;
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
            $Listing_data->gallery_image = json_encode( $gallery_images );
        }
    
        $amenities = $request->get( 'amenities' );
        $start_time = $request->get( 'start_time' );
        $end_time = $request->get( 'end_time' );
        $off_day = $request->get( 'off_day' );
        $social_icon = $request->get( 'social_icon' );
        $social_url = $request->get( 'social_url' );
        $social = [];
    
        if ( count( $social_icon ) === count( $social_url ) ) {
            $social = array_combine( $social_icon, $social_url );
        }
    
    
        $Listing_data->social = json_encode( $social );
        
        if ( $Listing_data->save() ) {
        
            $this->save_listing_time( $id, $start_time, $end_time, $off_day );
            $this->save_listing_amenities( $id, $amenities );
        
            $request->session()->flash( 'status', ['title' => 'Update Listing', 'type' => 'success'] );
            return redirect( 'listing/all_listing' );
        }
        $request->session()->flash( 'status', ['title' => 'Failed To Update Listing', 'type' => 'danger'] );
        return redirect( 'listing/'.$id.'/edit' );
    }
    
    public function savelisting( Request $request )
    {
        
        Validator::make( $request->all(), [
            'title'         => 'required',
            'email'         => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'cat_id'        => 'required',
            'city_id'       => 'required',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg'
        ] )->validate();
        
        $listing = [
            'title'           => $request->get( 'title' ),
            'email'           => $request->get( 'email' ),
            'latitude'        => $request->get( 'latitude' ),
            'longitude'       => $request->get( 'longitude' ),
            'cat_id'          => $request->get( 'cat_id' ),
            'city_id'         => $request->get( 'city_id' ),
            'phone'           => $request->get( 'phone' ),
            'website'         => $request->get( 'website' ),
            'description'     => $request->get( 'description' ),
            'video_url'       => $request->get( 'video_url' ),
            'created_by'      => Auth::user()->id,
            'update_by'       => Auth::user()->id,
            'validation_date' => date( 'Y-m-d', strtotime( "+7 day" ) ),
            'status'          => 0
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
        
        $amenities = $request->get( 'amenities' );
        $start_time = $request->get( 'start_time' );
        $end_time = $request->get( 'end_time' );
        $off_day = $request->get( 'off_day' );
        $social_icon = $request->get( 'social_icon' );
        $social_url = $request->get( 'social_url' );
        $social = [];
        
        if ( count( $social_icon ) === count( $social_url ) ) {
            $social = array_combine( $social_icon, $social_url );
        }
        
        
        $listing[ 'social' ] = json_encode( $social );
        $save = Listing::create( $listing );
        
        if ( $save ) {
            
            $this->save_listing_time( $save->id, $start_time, $end_time, $off_day );
            $this->save_listing_amenities( $save->id, $amenities );
            
            $request->session()->flash( 'status', ['title' => 'Create New Listing', 'type' => 'success'] );
            return redirect( 'listing' );
        }
        $request->session()->flash( 'status', ['title' => 'Failed To Create Listing', 'type' => 'danger'] );
        return redirect( 'addListing' );
    }
    
    public function deleteListing()
    {
    
    }
    
    public function getAllCategory()
    {
        return $categories = Categories::pluck( 'name', 'id' )->all();
    }
    
    public function getAllCity()
    {
        return $categories = City::pluck( 'name', 'id' )->all();
    }
    
    public function getAmenities()
    {
        return $categories = Amenties::select( 'name', 'id' )->get();
    }
    
    /**
     * @param $listing_id
     * @param $start_time
     * @param $end_time
     * @param $off_day
     * @return bool
     * @throws Exception
     */
    public function save_listing_time( $listing_id, $start_time, $end_time, $off_day )
    {
        ListingTime::where( 'listing_id', $listing_id )->delete();
        $business_hour = [];
        if ( !empty( $start_time ) ) {
            foreach ( $start_time as $day_name => $time ) {
                $day = [
                    'listing_id' => $listing_id,
                    'day'        => $day_name,
                    'start_time' => $time,
                    'end_time'   => $end_time[ $day_name ],
                    'close'      => isset( $off_day[ $day_name ] ) ? 1 : 0
                ];
                $business_hour[] = $day;
            }
            return ListingTime::insert( $business_hour );
        }
        return false;
    }
    
    /**
     * @param $listing_id
     * @param $amenities
     * @return bool
     * @throws Exception
     */
    public function save_listing_amenities( $listing_id, $amenities )
    {
        ListingAmenties::where( 'listing_id', $listing_id )->delete();
        if ( !empty( $amenities ) ) {
            $data = [];
            foreach ( $amenities as $amenitie ) {
                $data[] = [
                    'listing_id'   => $listing_id,
                    'amenities_id' => $amenitie,
                ];
            }
            return ListingAmenties::insert( $data );
        }
        return false;
    }
    
}
