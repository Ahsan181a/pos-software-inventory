<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/supplier',SupplierController::class);
Route::resource('/customer',CustomerController::class);
Route::resource('/unit',UnitController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);
Route::resource('/purchase',PurchaseController::class);