<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Client\HomeController;
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
})->name('home');
Route::prefix('admin')->group(function () {
    Route::resource('categories',CategoryController::class);
    Route::get('/search',[CustomerController::class, 'search'])->name('categories.search');
    Route::resource('foods',FoodsController::class);
    Route::get('/login',[LoginController::class,'getLogin'])->name('admin.login');
    Route::post('/login',[LoginController::class,'postLogin'])->name('admin.postLogin');
});
Route::prefix('client')->group(function(){
    Route::resource('home',HomeController::class);
});


