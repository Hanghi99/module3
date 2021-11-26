<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
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
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::resource('categories',CategoryController::class);
    Route::get('/search',[CustomerController::class, 'search'])->name('categories.search');
    Route::resource('products',ProductController::class);
    Route::get('/search',[ProductController::class, 'search'])->name('products.search');
});
 

