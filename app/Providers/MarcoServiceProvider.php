<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class MarcoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap', function($str){
            return Response::make(\strtoupper($str));
        });

        Response::macro('contact',function($action){
            $contact = '
                <form action="'.$action.'" method="POST">
                   Ho ten <input type="text">
                   Sdt  <input type="text">
                </form>
            ';
            return $contact;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
