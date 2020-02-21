<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function addListing(){
	    return view( 'frontend.dashboard.add' );
    }
}
