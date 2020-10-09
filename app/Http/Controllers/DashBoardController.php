<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(Auth::check() && Auth::user()->role!=1 || !Auth::check()){
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('dashboard.index');
    }
}
