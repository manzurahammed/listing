<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Review;
use App\Models\Bookmarked;
use Illuminate\Http\Response;
class ajaxController extends Controller
{
    public function searchFilter(Request $request)
    {
        $type = $request->input('type');
        $location = explode(',', $request->input('location'));
        $radius = $request->input('radius');
        $category_ID = $request->input('category_ID');
        $keywords = $request->input('keywords');

        if ($type == 'radius') {
            $LATITUDE = $location[0];
            $LONGITUDE = $location[1];
            $queryString = (!empty($category_ID) ? " AND cat_id = $category_ID" : '');
            $queryString .= (!empty($keywords) ? " AND title LIKE '%$keywords%'" : '');
            $listing = \DB::select(\DB::raw("SELECT *,listing.id as listing_id FROM (
            SELECT *, 
                (
                    (
                        (
                            acos(
                                sin(( $LATITUDE * pi() / 180))
                                *
                                sin(( `latitude` * pi() / 180)) + cos(( $LATITUDE * pi() /180 ))
                                *
                                cos(( `latitude` * pi() / 180)) * cos((( $LONGITUDE - `longitude`) * pi()/180)))
                        ) * 180/pi()
                    ) * 60 * 1.1515 * 1.609344
                )
            as distance FROM `listing`
        ) listing
        INNER JOIN categories ON categories.id=listing.cat_id
        WHERE (distance <= $radius $queryString)
        LIMIT 15"));
        } else {
            if ($category_ID !== null) {
                $listing = \DB::table('listing')
                    ->join('categories', 'categories.id', '=', 'listing.cat_id')
                    ->select('categories.*', 'listing.*', 'listing.id as listing_id')
                    ->Where('categories.id', $category_ID)
                    ->where('title', 'like', '%' . $keywords . '%')->get();
            } else {
                $listing = \DB::table('listing')
                    ->join('categories', 'categories.id', '=', 'listing.cat_id')
                    ->select('categories.*', 'listing.*', 'listing.id as listing_id')
                    ->where('title', 'like', '%' . $keywords . '%')->get();
            }
        }
        // send respond markup
        $markup = '<div class="row">';
        if (count($listing) > 0) {
            foreach ($listing as $item) {
                $icon = "/upload/default_image/avater-".rand(1,5).".jpg";
                $markup .= '<div class="result-item col-md-6 map-top-result-item">';
                $markup .= '<div class="lrn-listing-wrap" data-latitude="' . $item->latitude . '" data-longitude="' . $item->longitude . '" data-mapicon="' . url('upload/cat_image/' . $item->image) . '">
                    <div class="listing-thumb">
                        <a href="listing/' . $item->listing_id . '/details">
                            <img class="img-fluid" src="' . url('feature_image/' . $item->feature_image) . '" alt="featured image" />
                        </a>
                    </div>
                    <div class="listing-body">
                        <div class="meta">
                            <a href="/search" class="avater">
                                <img src="'.$icon.'" class="img-fluid" alt="">
                            </a>
                            <a href="#" class="favourite"><span class="ti-heart"></span></a>
                            <a href="listing/'.$item->id.'/details" class="preview" ><span class="ti-eye"></span></a>
                            
                        </div>
                        <h3 class="varified"><a href="listing/' . $item->listing_id . '/details">' . $item->title . '</a></h3>
                        <div class="reviews">
                            <div class="rating">3.9</div>
                            <span>13 Reviews</span>
                        </div>
                        <div class="listing-location">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>'.$item->website.'</span>
                        </div>
                        
                        <div class="listing-category">
                            <div class="icon">
                                <img class="img-fluid" src="' . url('upload/cat_image/' . $item->image) . '" alt="icon" />
                            </div>
                            <span><a href="/search">' . $item->name . '</a></span>
                        </div>
                        <div class="listing-bottom">
                            <span><i class="fas fa-phone"></i>'.$item->phone.'</span>
                            <span class="status open"><i class="far fa-clock"></i>Open Now</span>
                        </div>
                    </div>
                </div>';
                $markup .= '</div>';
            }
        } else {
            $markup .= '<div class="col-lg-4 col-md-6 map-top-result-item"><p>Sorry, no items found.</p></div>';
        }
        $markup .= '</div>';

        return response()->json(array('markup' => $markup), 200);
    }
    
    public function save_review(Request $request){
        $check = Review::select('id')
            ->where('user_id',Auth::user()->id)
            ->where('listing_id',$request->input( 'listing_id' ))
            ->first();
        if($check){
            return response()->json(array('success' => false,'message'=>'You Already Give Review for this Listing'));
        }
        $review = new Review();
        $review->rating = $request->input( 'listing_rating' );
        $review->description = $request->input( 'listing_description' );
        $review->title = $request->input( 'listing_title' );
        $review->listing_id = $request->input( 'listing_id' );
        $review->user_id = Auth::user()->id;
        $review->review_date = date('Y-m-d');
        
        if ( $review->save() ) {
            $review->user_name = Auth::user()->name;
            $review->image = Auth::user()->image;
            $html = view('page.review')->with(compact('review'))->render();
            return response()->json(array('success' => true, 'payload' => $html));
        }else{
            return response()->json(array('success' => false,'message'=>'Error'));
        }
    }
    public function save_favorite(Request $request){
        
        if(!Auth::check()){
            return response()->json(array('success' => false,'message'=>'Please Login'));
        }
        
        $check = Bookmarked::select('id')
            ->where('user_id',Auth::user()->id)
            ->where('listing_id',$request->input( 'listing_id' ))
            ->first();
        if($check){
            return response()->json(array('success' => false,'message'=>'You Already Bookmarked this Listing'));
        }
        
        $bookmarked = new Bookmarked();
        $bookmarked->listing_id = $request->input( 'listing_id' );
        $bookmarked->user_id = Auth::user()->id;
        
        if ( $bookmarked->save() ) {
            return response()->json(array('success' => true,'message'=>'Bookmarked'));
        }else{
            return response()->json(array('success' => false,'message'=>'Error'));
        }
    }
}
