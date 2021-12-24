<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Admin\CountryInterface;
use App\Interfaces\Admin\CityInterface;
use App\Interfaces\Admin\AdminInterface;
use App\Interfaces\Admin\WebsiteInfoInterface;
use App\Repositories\Admin\CountryRepository;
use App\Repositories\Admin\CityRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\WebsiteInfoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryInterface::class,CountryRepository::class);
        $this->app->bind(CityInterface::class,CityRepository::class);
        $this->app->bind(AdminInterface::class,AdminRepository::class);
        $this->app->bind(WebsiteInfoInterface::class,WebsiteInfoRepository::class);
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
