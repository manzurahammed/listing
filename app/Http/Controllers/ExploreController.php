<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
