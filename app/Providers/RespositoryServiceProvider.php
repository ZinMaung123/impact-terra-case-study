<?php

namespace App\Providers;

use App\Repositories\BaseRepositoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Eloquents\MarketProductRepository;
use App\Repositories\Eloquents\PriceHistoryRepository;
use App\Repositories\MarketProductInterface;
use App\Repositories\PriceHistoryInterface;
use Illuminate\Support\ServiceProvider;

class RespositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(MarketProductInterface::class, MarketProductRepository::class);
        $this->app->bind(PriceHistoryInterface::class, PriceHistoryRepository::class);
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
