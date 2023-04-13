<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SolidCrud\Modules\Seller\Product\Api\v1\Interfaces\ProductRepositoryInterface;
use SolidCrud\Modules\Seller\Product\Api\v1\Repositories\ProductRepository;

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

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
