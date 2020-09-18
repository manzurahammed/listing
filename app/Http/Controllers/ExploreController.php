<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Listing;
class ExploreController extends Controller
{
    public function index()
    {
        $listing = \DB::table('listing')->join('categories', 'categories.id', '=', 'listing.cat_id')->select('categories.*', 'listing.*')->get();
        $category = \DB::table('categories')->get();
        $amenties = \DB::table('amenties')->get();

        return view('page.explore', [
            'listing' => $listing,
            'category' => $category,
            'amenties'  => $amenties
        ]);
    }
    
    public function mainPage(){
        $categories = Categories::select('id','name','slug','show_nav','image')->where('show_nav',1)->paginate(5);
        $listing = Listing::where('status',0)->with('catname')->paginate(5);
        return view('welcome',[
            'categories' => $categories,
            'listing' => $listing
        ]);
    }
}
