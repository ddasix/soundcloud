<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('maxpost', function($attribute, $value, $parameters, $validator) {
            $count = Post::whereBetween('created_at',[date('Y-m-d').' 00:00:01',date('Y-m-d').' 23:59:59'])->count();
            return $count <= $parameters[0];
        });
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
