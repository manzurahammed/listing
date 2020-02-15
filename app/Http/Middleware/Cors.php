<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$domins = array('http://localhost:8080');
		if(isset($request->server()['HTTP_ORIGIN'])){
			$origin = $request->server()['HTTP_ORIGIN'];
			if(in_array($origin,$domins)){
				header('Access-Control-Allow-Origin: '.$origin);
				header('Access-Control-Allow-Methods: GET, POST');
				header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
			}
		}
        return $next($request);
    }
}
