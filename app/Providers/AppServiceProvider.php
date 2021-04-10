<?php

namespace App\Providers;

use App\Observers\LessonObserver;
use App\Observers\SectionObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Lesson;
use App\Models\Section;

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
        Lesson::observe(LessonObserver::class);
        Section::observe(SectionObserver::class);

        //Genermos nuestras propias directivas de BLADE para resources\views\layouts\instructor.blade.php
        Blade::directive('routeIs', function ($expRouteIs) {
            return "<?php if(Request::url()== route($expRouteIs)): ?>";
        });
    }
    
}
