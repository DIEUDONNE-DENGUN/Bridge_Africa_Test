<?php

namespace App\Providers;

use App\Services\Interfaces\UtilityServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\ProductService;
use App\Services\UserService;
use App\Services\UtilityService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register all application services or service layer here.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(UtilityServiceInterface::class, UtilityService::class);
    }
}
