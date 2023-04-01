<?php

namespace App\Providers;

use App\Http\Resources\InspectionResource;
use App\Http\Resources\VehicleResource;
use App\Http\Resources\WorkerResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        WorkerResource::withoutWrapping();
        VehicleResource::withoutWrapping();
        InspectionResource::withoutWrapping();
    }
}
