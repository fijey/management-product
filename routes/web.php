<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesOrderController;

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
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard','\App\Http\Controllers\DashboardController')->only(['index']);
    //brand
    Route::resource('brand','\App\Http\Controllers\BrandController')->except('destroy');
    Route::get('brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/getbrand', [BrandController::class, 'getbrand'])->name('get.brand');
    //product
    Route::resource('product','\App\Http\Controllers\ProductController')->except('destroy');
    Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/getproduct', [ProductController::class, 'getproduct'])->name('get.product');

    //Customer
    Route::resource('customer','\App\Http\Controllers\CustomerController')->except('destroy');
    Route::get('customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/getcustomer', [CustomerController::class, 'getcustomer'])->name('get.customer');
   
    //Sales Order
    Route::resource('sales-order','\App\Http\Controllers\SalesOrderController')->except('destroy');
    Route::get('sales-order/delete/{id}', [SalesOrderController::class, 'destroy'])->name('sales-order.destroy');
    Route::get('/getsalesorder', [SalesOrderController::class, 'getsalesorder'])->name('get.salesorder');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/register' , [AuthController::class,'register']);
Route::post('/register' , [AuthController::class,'registerstore']);
Route::get('/logout' , [AuthController::class,'destroy']);
