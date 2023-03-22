<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
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
        // Get themes list of data
//        $themes = Theme::all();
//        dd($themes);

        // Providing a list of themes data to the main view
        View::composer('layouts.app', function ($view) {

            // Provide the theme data to the view
//            $themes = Theme::all();

            $currentThemeId = Cookie::get('theme') ?? 1;

            $view->with('themes', Theme::all())
                ->with('selectedTheme', Theme::find($currentThemeId));

        });
    }
}
