<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\View\Components\DialogAlert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Auth\Notifications\ResetPassword;

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
        Blade::component('dialogue-alert', DialogAlert::class);
      


        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return 'https://api.socediamn.org/reset-password/'.$token;
        });
    }
}
