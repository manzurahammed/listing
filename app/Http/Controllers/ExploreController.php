<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Listing;
class ExploreController extends Controller
{
    public function index()
    {
        $listing = Listing
            ::join('review','listing.id','=','review.listing_id','left')
            ->select('listing.*',\DB::raw('count(review.id) total_rating'),\DB::raw('(sum(rating)/count(review.id)) as rating'))
            ->groupBy('listing.id')
            ->where('status',0)->with('catname')->paginate(10);
        
        $category = \DB::table('categories')->get();
        $amenties = \DB::table('amenties')->get();

        return view('page.explore', [
            'listing' => $listing,
            'category' => $category,
            'amenties'  => $amenties
        ]);
    }
    
    public function mainPage(){
        $categories = Categories::select('id','name','slug','show_nav','image','icon')->where('show_nav',1)->paginate(5);
        $listing = Listing
            ::join('review','listing.id','=','review.listing_id','left')
            ->select('listing.*',\DB::raw('count(review.id) total_rating'),\DB::raw('(sum(rating)/count(review.id)) as rating'))
            ->groupBy('listing.id')
            ->where('status',0)->with('catname')->paginate(10);
        
        $city = Listing::join('city','city.id','=','listing.city_id')
            ->select(\DB::raw('count(listing.id) as total'),'city_id','city.name','city.image')
            ->groupBy('city_id')
            ->limit(5)
            ->get();
        return view('welcome',[
            'categories' => $categories,
            'listing' => $listing,
            'city' => $city
        ]);
    }
}
