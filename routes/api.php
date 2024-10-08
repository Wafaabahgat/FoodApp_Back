<?php

use App\Http\Controllers\API\BranchesController;
use App\Http\Controllers\API\CaruselsController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\DishesController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\API\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{id}', [RestaurantController::class, 'show']);
Route::post('restaurants', [RestaurantController::class, 'store']);
Route::put('restaurants/{id}', [RestaurantController::class, 'update']);
Route::delete('restaurants/{id}', [RestaurantController::class, 'destroy']);

// DishesController
Route::get('/dishes', [DishesController::class, 'index']);
Route::post('/dishes', [DishesController::class, 'store']);
Route::get('/dishes/{id}', [DishesController::class, 'show']);
Route::put('/dishes/{id}', [DishesController::class, 'update']);
Route::delete('/dishes/{id}', [DishesController::class, 'destroy']);

// CategoriesController
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

// CaruselsController
Route::get('/carusels', [CaruselsController::class, 'index']);
Route::post('/carusels', [CaruselsController::class, 'store']);
Route::get('/carusels/{id}', [CaruselsController::class, 'show']);
Route::put('/carusels/{id}', [CaruselsController::class, 'update']);
Route::delete('/carusels/{id}', [CaruselsController::class, 'destroy']);

// BranchesController
Route::get('/branches', [BranchesController::class, 'index']);
Route::post('/branches', [BranchesController::class, 'store']);
Route::get('/branches/{id}', [BranchesController::class, 'show']);
Route::put('/branches/{id}', [BranchesController::class, 'update']);
Route::delete('/branches/{id}', [BranchesController::class, 'destroy']);

// CountryController
Route::get('/country', [CountryController::class, 'index']);
Route::post('/country', [CountryController::class, 'store']);
Route::get('/country/{id}', [CountryController::class, 'show']);
Route::put('/country/{id}', [CountryController::class, 'update']);
Route::delete('/country/{id}', [CountryController::class, 'destroy']);

// LoginController
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout', [LoginController::class, 'logout']);