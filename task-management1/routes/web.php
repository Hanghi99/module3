<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
Route::prefix('customers')->group(function () {
    Route::get('/',[CustomerController::class,'index'])->name('products.index');
    Route::get('/create',[CustomerController::class,'create'])->name('products.create');
    Route::post('/create',[CustomerController::class,'store'])->name('products.store');
    Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('products.edit');
    Route::put('/{id}/update',[CustomerController::class,'update'])->name('products.update');
    Route::get('/{id}/delete',[CustomerController::class,'destroy'])->name('products.destroy');
    Route::get('/{id}/show',[CustomerController::class,'show'])->name('products.show');
    
});
