<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
	/**
          $this->app->bind('path.public',function(){
                return base_path().'/';
            }
        );
	*/
=======
        $this->app->bind('path.public',function(){
                return base_path().'/';
            }
        );
>>>>>>> 2117950115c8ac985a3b2850b2869c348d364f43
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
