<?php

namespace App\Providers;

use App\Filesystem\GoogleCloudStorageAdapter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

class GoogleCloudStorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Storage::extend('gcs', function ($app, $config) {
            $adapter = new GoogleCloudStorageAdapter($config);
            
            return new Filesystem($adapter, $config);
        });
    }
}
