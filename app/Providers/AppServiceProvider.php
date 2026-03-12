<?php

namespace App\Providers;
use App\Models\batch;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    if (Schema::hasTable('batches')) {

        $currentBatch = batch::where('status',1)->select('batchId')->first();

        $currentBatchIdNow = $currentBatch ? $currentBatch->batchId : null;

        view()->share('currentBatchId', $currentBatchIdNow);
    }
}
}
