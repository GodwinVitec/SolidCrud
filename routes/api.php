<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SolidCrud\Modules\Seller\Product\Api\v1\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => '/products'], function () {

    Route::post('products', [ProductController::class, 'store']);
    Route::get('products', [ProductController::class, 'products']);
    Route::get('product/{id}', [ProductController::class, 'product']);
    Route::get('products/search', [ProductController::class, 'search']);
    Route::put('product', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'delete']);
// });
