<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Admin\CountryInterface;
use App\Interfaces\Admin\CityInterface;
use App\Interfaces\Admin\AdminInterface;
use App\Interfaces\Admin\WebsiteInfoInterface;
use App\Interfaces\Admin\CategoryInterface;
use App\Interfaces\Admin\SubCategoryInterface;
use App\Interfaces\Admin\SubSubCategoryInterface;
use App\Interfaces\Admin\ProductInterface;
use App\Repositories\Admin\CountryRepository;
use App\Repositories\Admin\CityRepository;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\WebsiteInfoRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\SubCategoryRepository;
use App\Repositories\Admin\SubSubCategoryRepository;
use App\Repositories\Admin\ProductRepository;

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
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(SubCategoryInterface::class,SubCategoryRepository::class);
        $this->app->bind(SubSubCategoryInterface::class,SubSubCategoryRepository::class);
        $this->app->bind(ProductInterface::class,ProductRepository::class);
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
