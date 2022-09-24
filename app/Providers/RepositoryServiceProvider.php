<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Contracts\LayananContract::class, \App\Services\LayananService::class);

        $this->app->singleton(\App\Contracts\PertanyaanContract::class, \App\Services\PertanyaanService::class);

        $this->app->singleton(\App\Contracts\JawabanContract::class, \App\Services\JawabanService::class);

        $this->app->singleton(\App\Contracts\KuesionerContract::class, \App\Services\KuesionerService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
