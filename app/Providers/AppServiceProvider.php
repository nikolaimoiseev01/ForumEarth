<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Carbon::setLocale('ru');
        RedirectIfAuthenticated::redirectUsing(function () {
            return route('account.settings');
        });
    }
}
