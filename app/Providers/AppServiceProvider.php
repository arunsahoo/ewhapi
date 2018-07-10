<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Resource::withoutWrapping();
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::routes();
    }
}
