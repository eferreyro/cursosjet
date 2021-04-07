<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Genermos nuestras propias directivas de BLADE para resources\views\layouts\instructor.blade.php
        Blade::directive('routeIs', function ($expRouteIs) {
            return "<?php if(Request::url()== route($expRouteIs)): ?>";
        });
    }
}
