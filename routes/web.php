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
Route::get('/', 'ExploreController@index')->name('home');
Route::get('/admin', 'DashBoardController@index')->name('admin');
Route::post('/searchmap', 'ajaxController@searchFilter');

Route::group(['middleware' => 'auth'], function () {
	Route::prefix('listing')->group(function () {
		Route::get('/', 'frontend\DashBoardController@index');
		Route::get('/profile', 'frontend\DashBoardController@editProfile');
		Route::put('/profilestore/{id}', array('uses' => 'frontend\DashBoardController@updateProfile', 'as' => 'listing.profile'));
		Route::get('/all_listing', 'frontend\ListingController@viewListing');
		Route::get('/active_listing', 'frontend\ListingController@activeListing');
		Route::get('/pending_listing', 'frontend\ListingController@pendingListing');
		Route::get('/expired_listing', 'frontend\ListingController@expiredListing');
		Route::get('/add', 'frontend\ListingController@addListing');
		Route::get('/{id}/edit', 'frontend\ListingController@editListing');
		Route::post('/savelisting', 'frontend\ListingController@savelisting');
		Route::get('/bookmarked', 'frontend\ListingController@bookmarked');
		Route::get('/review', 'frontend\ListingController@review');
		Route::delete('/delete/{id}', array('uses' => 'frontend\ListingController@deleteListing', 'as' => 'listing.delete'));
		Route::put('/store/{id}', array('uses' => 'frontend\ListingController@updateListing', 'as' => 'listing.update'));
	});
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
