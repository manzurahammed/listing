<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function searchFilter(Request $request)
    {
        $category_ID = $request->input('category_ID');
        $keywords = $request->input('keywords');

        $listing = \DB::table('listing')
            ->join('categories', 'categories.id', 'listing.cat_id')
            ->where('categories.id', $category_ID)
            ->where('title', 'like', '%' . $keywords . '%')->get();

        // send respond markup
        $markup = '<div class="row">';
        if (count($listing) > 0) {
            foreach ($listing as $item) {
                $markup .= '<div class="col-lg-4 col-md-6 map-top-result-item">';
                $markup .= '<div class="lrn-listing-wrap" data-latitude="' . $item->latitude . '" data-longitude="' . $item->longitude . '" data-mapicon="' . url('upload/cat_image/' . $item->image) . '">
                    <div class="listing-thumb">
                        <a href="listing/{{$item->id}}/details">
                            <img class="img-fluid" src="' . url('feature_image/' . $item->feature_image) . '" alt="featured image" />
                        </a>
                    </div>
                    <div class="listing-body">
                    <div class="meta">
                        <a href="#" class="favourite"><span class="ti-heart"></span></a>
                        <a href="#" class="preview" data-toggle="modal" data-target="#listingModal"><span class="ti-eye"></span></a>
                    </div>
                    <h3><a href="listing/' . $item->id . '/details">' . $item->title . '</a></h3>
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
