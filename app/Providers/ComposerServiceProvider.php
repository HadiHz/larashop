<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.frontend',
            'App\Http\ViewComposers\CategoryComposer'
        );

        view()->composer(
            'layouts.frontend',
            'App\Http\ViewComposers\SettingComposer'
        );

        view()->composer(
            'frontend.home.aboutUs',
            'App\Http\ViewComposers\SettingComposer'
        );

        view()->composer(
            'frontend.home.contactUs',
            'App\Http\ViewComposers\SettingComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
