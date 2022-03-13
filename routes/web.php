<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::prefix('images')->middleware(['auth'])->group(function () {
    Route::get('/', [ImageController::class, 'images'])->name('images');
    Route::get('/getallimages', [ImageController::class, 'getAllImages'])->name('getAllImages');
    Route::get('/getimages', [ImageController::class, 'getImages'])->name('getImages');
    Route::get('/imageCreated', [ImageController::class, 'imageCreated'])->name('imageCreated');
    Route::post('/addImages', [ImageController::class, 'addImages'])->name('addImages');
});

Route::prefix('categories')->middleware(['auth'])->group(function () {
    Route::get('/', [CategoryController::class, 'categories'])->name('categories');
    Route::get('/categoryCreated', [CategoryController::class, 'categoryCreated'])->name('categoryCreated');
    Route::post('/addCategories', [CategoryController::class, 'addCategories'])->name('addCategories');
});