<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\WebsiteInfoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/admin',
        'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
    /** General Settings **/
    Route::resource('countries', CountryController::class);
    Route::resource('cities', CityController::class);
    Route::post('change-city-status', [CityController::class, 'changeStatus'])->name('city.changeStatus');
    Route::post('change-country-status', [CountryController::class, 'changeStatus'])->name('country.changeStatus');

    /** Admins **/
    Route::get('dashboard',[AdminController::class, 'dashboard'])->name('admin');
    Route::get('country-cities',[AdminController::class, 'getCitiesByCountries'])->name('admin.getCitiesByCountries');
    Route::resource('admins', AdminController::class);
    Route::get('change-admin-status', [AdminController::class, 'changeStatus'])->name('admin.changeStatus');

    /**Website Info**/
    Route::get('website-info', [WebsiteInfoController::class, 'index'])->name('info.index');
    Route::put('website-info', [WebsiteInfoController::class, 'update'])->name('info.update');

    /**categories**/
    Route::resource('categories', CategoryController::class);
    Route::resource('categories/{category_id}/sub_categories',SubCategoryController::class);
    Route::resource('categories/{category_id}/sub_categories/{sub_category_id}/sub_sub_categories',SubSubCategoryController::class);
    Route::get('sub_categories-category', [SubCategoryController::class, 'getSubCategoryByCategoryID'])->name('category.getSubCategoryByCategoryID');
    Route::get('sub-sub_categories-sub_category', [SubSubCategoryController::class, 'getSubSubCategoryBySubCategoryID'])->name('sub_category.getSubSubCategoryBySubCategoryID');
    /**products**/
    Route::resource('products', ProductController::class);

});

require __DIR__.'/auth.php';
