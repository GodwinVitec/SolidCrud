<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $path = base_path('modules');

        $this->loadMigrationsFrom([
            $path . '/Seller/Product/Api/v1/Migrations',
        ]);
    }
}
