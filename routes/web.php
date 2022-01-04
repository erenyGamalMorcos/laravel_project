<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\WebsiteInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -----multi auth for admin-----
//Route::get('/admin/dashboard', function () {
//    return view('admin.dashboard');
//})->middleware(['auth:admin'])->name('admin');// fel RouteServiceProvider


// -----multi auth for user-----
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//
//Route::group(
//    [
//        'prefix' => LaravelLocalization::setLocale().'/admin',
//        'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//    ], function() {
//    /** General Settings **/
//    Route::resource('countries', CountryController::class);
//    Route::resource('cities', CityController::class);
//    Route::post('change-city-status', [CityController::class, 'changeStatus'])->name('city.changeStatus');
//    Route::post('change-country-status', [CountryController::class, 'changeStatus'])->name('country.changeStatus');
//
//    /** Admins **/
//    Route::get('dashboard',[AdminController::class, 'dashboard'])->name('admin');
//    Route::get('country-cities',[AdminController::class, 'getCitiesByCountries'])->name('admin.getCitiesByCountries');
//    Route::resource('admins', AdminController::class);
//    Route::get('change-admin-status', [AdminController::class, 'changeStatus'])->name('admin.changeStatus');
//
//    /**Website Info**/
//    Route::get('website-info', [WebsiteInfoController::class, 'index'])->name('info.index');
//    Route::put('website-info', [WebsiteInfoController::class, 'update'])->name('info.update');
//
//});

require __DIR__.'/auth.php';

// ---- route to open all admin pages----
Route::get('/{page}', [AdminController::class, 'adminRouting']);

