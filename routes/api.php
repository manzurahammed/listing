<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api','throttle:60,1')->group(function () {
	Route::get('menu', 'api\PaperApiController@getAllMenu');
	Route::get('homecat', 'api\PaperApiController@getcatwisepap');
	Route::get('category/{catname}', 'api\PaperApiController@getcategorydata');
	Route::get('category/{catname}/paper/{papername}', 'api\PaperApiController@getpaper');
	Route::get('page', 'api\PaperApiController@getpage');
	Route::get('meta', 'api\PaperApiController@getmeta');
	Route::get('allpaper', 'api\PaperApiController@getallpapersize');
	Route::get('page/{slug}', 'api\PaperApiController@getPageContent');
});
