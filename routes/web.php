<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'DashBoardController@index')->name('home');
Route::prefix('listing')->group(function () {
	Route::get('/', 'frontend\DashBoardController@index');
	Route::get('/profile', 'frontend\DashBoardController@editProfile');
	Route::get('/listings', 'frontend\DashBoardController@listings');
	Route::get('/active', 'frontend\DashBoardController@active');
	Route::get('/pending', 'frontend\DashBoardController@pending');
	Route::get('/expired', 'frontend\DashBoardController@expired');
	Route::get('/add', 'frontend\ListingController@addListing');
	Route::post('/savelisting', 'frontend\ListingController@savelisting');
	Route::get('/bookmarked', 'frontend\DashBoardController@bookmarked');
	Route::get('/review', 'frontend\DashBoardController@review');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resources([
	    'categories' => 'CategoryController',
	    'cities' => 'CityController',
	    'amenties' => 'AmentiesController',
	    'papersize' => 'PaperSizeController',
	    'users' => 'UserController',
	    'pages' => 'PageController',
	]);
	Route::get('/dashboard', 'DashBoardController@index');
	Route::get('/catpaper', 'CatPaperController@index');
	Route::post('/catpaper', 'CatPaperController@store');
	Route::post('/getpaperlisrt', 'CatPaperController@paperlist');
	Route::post('/show_nav', 'CategoryController@show_nav');
	Route::post('/city_show_nav', 'CityController@city_show_nav');
	Route::post('/updatestatus', 'UserController@updatestatus');
	Route::get('/logout', 'UserController@logout');
	Route::get('/profile', 'UserController@profile');
	Route::post('/profileupdate', 'UserController@profileUpdate');
	Route::get('/setting', 'SettingController@index');
	Route::post('/setting_save', 'SettingController@setting_save');
	Route::post('/pagestatus', 'PageController@pagestatus');
});
