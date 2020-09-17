<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;
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
        $siteSetting = GeneralSetting::first();

        Config::set('siteSetting', $siteSetting);
        $site = [
            'currency_symble' => $siteSetting->currency_symble,
            'STRIPE_KEY' => '',
        ];
        view()->share('site', $site);
    }
}
