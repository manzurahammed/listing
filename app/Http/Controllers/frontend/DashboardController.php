<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
class DashboardController extends Controller {
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index () {
		return view( 'frontend.dashboard.main' );
	}
	
}
