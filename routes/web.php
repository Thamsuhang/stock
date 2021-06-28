<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
        Route::resource('warehouses', \App\Http\Controllers\Admin\WarehouseController::class);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('stocks', \App\Http\Controllers\Admin\StockController::class);
    });
    Route::get('/stock-out', [\App\Http\Controllers\Admin\StockController::class, 'out'])->name('stock-out');
    Route::get('/report', [\App\Http\Controllers\Admin\StockController::class, 'report'])->name('report');
    Route::get('/stocks/adjust/{id}', [\App\Http\Controllers\Admin\StockController::class, 'adjust'])->name('stocks/adjust')->where(['id' => '[0-9]{1,5}']);;
    Route::post('transfer',[\App\Http\Controllers\Admin\StockController::class, 'transfer'])->name('stocks.transfer');
    Route::post('get-report',[\App\Http\Controllers\Admin\StockController::class, 'getReport'])->name('stocks.getReport');
});
