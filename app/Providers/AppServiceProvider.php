<?php

namespace App\Providers;
use App\Models\Batch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
   public function boot(): void
{
    if (request()->hasHeader('X-Forwarded-Host')) {
        URL::forceRootUrl(
            request()->header('X-Forwarded-Proto') . '://' . request()->header('X-Forwarded-Host')
        );

        URL::forceScheme('https');
    }
}
}
