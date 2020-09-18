<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                $markup .= '<div class="col-lg-4 col-md-6 map-top-result-item">';
                $markup .= '<div class="lrn-listing-wrap" data-latitude="' . $item->latitude . '" data-longitude="' . $item->longitude . '" data-mapicon="' . url('upload/cat_image/' . $item->image) . '">
                    <div class="listing-thumb">
                        <a href="listing/' . $item->listing_id . '/details">
                            <img class="img-fluid" src="' . url('feature_image/' . $item->feature_image) . '" alt="featured image" />
                        </a>
                        <div class="locationroute"></div>
                    </div>
                    <div class="listing-body">
                    <h3><a href="listing/' . $item->listing_id . '/details">' . $item->title . '</a></h3>
                    <div class="listing-location">
                        <span>' . \Illuminate\Support\Str::limit(strip_tags($item->description), 50) . '</span>
                    </div>
                    <div class="listing-category">
                        <div class="icon">
                        <img class="img-fluid" src="' . url('upload/cat_image/' . $item->image) . '" alt="icon" />
                        </div>
                    <span><a href="#">' . $item->name . '</a></span>
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
}
