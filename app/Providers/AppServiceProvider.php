<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

use AzureOss\Storage\Blob\BlobServiceClient;
use AzureOss\FlysystemAzureBlobStorage\AzureBlobStorageAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Storage::extend('azure', function (Application $app, array $config) {

            $connection = sprintf(
                'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s;EndpointSuffix=%s',
                $config['name'],
                $config['key'],
                $config['endpoint_suffix'] ?? 'core.windows.net'
            );

            $blobService   = BlobServiceClient::fromConnectionString($connection);
            $container     = $blobService->getContainerClient($config['container']);
            $adapter       = new AzureBlobStorageAdapter($container);

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
