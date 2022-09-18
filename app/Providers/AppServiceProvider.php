<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
        Response::macro('success', function(mixed $data = null, string $message = 'Success', int $status = 200) {
            return response()->json([
                'data' => $data,
                'message' => $message
            ], $status);
        });

        Response::macro('error', function(mixed $data = null, string $message = 'Whoops, something went wrong.', int $status = 500) {
            return response()->json([
                'data' => $data,
                'message' => $message
            ], $status);
        });
    }
}
