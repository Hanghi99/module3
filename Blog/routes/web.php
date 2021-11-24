<?php

use App\Http\Controllers\BlogController;
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

Route::group(['prefix' => 'Blogs'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('Blogs.index');
    Route::get('/create', [BlogController::class, 'create'])->name('Blogs.create');
    Route::post('/create', [BlogController::class, 'store'])->name('Blogs.store');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('Blogs.edit');
    Route::post('/{id}/edit', [BlogController::class, 'update'])->name('Blogs.update');
    Route::get('/{id}/destroy', [BlogController::class, 'destroy'])->name('Blogs.destroy');
});