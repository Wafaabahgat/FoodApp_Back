<?php

use App\Http\Controllers\Admin\Admin_panel_settingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Finance_calendersController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CaruselsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(
    [
        // 'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => 'auth:admin'
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard'); //route
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        /*    */
        Route::resource('/restaurants', RestaurantController::class);
        Route::resource('/branches', BranchesController::class);
        Route::resource('/country', CountryController::class);
        Route::resource('/categories', CategoriesController::class);
        Route::resource('/carusels', CaruselsController::class);
        Route::resource('/dishes', DishesController::class);
        Route::resource('/orders', OrderController::class);
        // Route::get('/orders', [OrderItemController::class, 'create']);
    },
);


Route::group(
    [
        // 'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => 'guest:admin'
    ],
    function () {
        // login //
        Route::get('login', [
            LoginController::class,
            'show_login_view'
        ])->name('admin.showlogin');

        Route::post('login', [
            LoginController::class,
            'login'
        ])->name('admin.login');
    },

);

// when page not found
Route::fallback(
    function () {
        return redirect()->route('admin.showlogin');
    }
);