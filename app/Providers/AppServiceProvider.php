<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
use App\Models\Page;
use App\Models\PaperSize;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Validator::extend('slug_unique', function($attribute, $value, $parameters, $validator) {			
			$query = Page::where('slug',$value);
			if(!empty($parameters[1])){
				$query = $query->where('id','<>',$parameters[1]);
			}
			$query = $query->take(1)->get();
			if($query->isEmpty()){
				return true;
			}else{
				return false;
			}
        });
		Validator::extend('paps', function($attribute, $value, $parameters, $validator) {			
			if(!empty($parameters[2])){
				$query = PaperSize::where('name',$value)->where('cat_id',$parameters[1])->where('id','<>',$parameters[2]);
			}else{
				$query = PaperSize::where('name',$value)->where('cat_id',$parameters[1]);
			}
			$query = $query->take(1)->get();
			if($query->isEmpty()){
				return true;
			}else{
				return false;
			}
        });
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
