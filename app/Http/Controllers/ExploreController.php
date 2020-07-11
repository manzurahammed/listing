<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $listing = \DB::table('listing')->join('categories', 'categories.id', 'listing.cat_id')->get();
        return view('page.explore', ['listing' => $listing]);
    }
}
