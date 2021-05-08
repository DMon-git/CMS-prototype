<?php
namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PostRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );
    }
}