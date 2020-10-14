<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        return redirect('users');
    }
}
