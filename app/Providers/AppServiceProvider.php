<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength('191');
        Paginator::useBootstrap();

        Blade::if('admin', function (){
            return auth()->user()->hasAdminRole();
        });

        Blade::if('editor', function () {
            return auth()->user()->hasEditorRole();
        });

        Carbon::setLocale('fr');

        // Format de date par défaut de l'application
        Carbon::macro('toFormattedDatetime', function () {
            return $this->translatedFormat('d M Y à H:i');
        });

        // Second Format de date de l'application
        Carbon::macro('toFormattedDatetime2', function () {
            return $this->translatedFormat('d/m/Y à H:i');
        });

        // Format de date par défaut de l'application
        Carbon::macro('toFormattedDate', function () {
            return $this->translatedFormat('d M Y');
        });

        // Format de date par défaut de l'application
        Carbon::macro('toFormattedDate2', function () {
            return $this->translatedFormat('d/m/Y');
        });

        // Format de l'heure par défaut de l'application
        Carbon::macro('toFormattedTime', function () {
            return $this->translatedFormat('H:i');
        });
    }
}
