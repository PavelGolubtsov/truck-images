<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'showUserAuth'])->name('showUserProfile');
    Route::get('/userCategories', [UserController::class, 'showUserCategories'])->name('showUserCategories');
    Route::get('/userImages', [UserController::class, 'showUserImages'])->name('showUserImages');
});

Route::prefix('images')->middleware(['auth'])->group(function () {
    Route::get('/', [ImageController::class, 'getImages'])->name('images');
    Route::get('/getallimages', [ImageController::class, 'getAllImages'])->name('getAllImages');
    Route::get('/getimages', [ImageController::class, 'getImages'])->name('getImages');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'indexAdmin'])->name('admin.home');
    Route::get('/showCategories', [CategoryController::class, 'showCategories'])->name('admin.showCategories');
    Route::get('/showUsers', [UserController::class, 'showUsers'])->name('admin.showUsers');
    Route::get('/categoryCreated', [CategoryController::class, 'categoryCreated'])->name('admin.categoryCreated');
    Route::post('/addCategories', [CategoryController::class, 'addCategories'])->name('admin.addCategories');
    Route::get('/imageCreated', [ImageController::class, 'imageCreated'])->name('admin.imageCreated');
    Route::post('/addImages', [ImageController::class, 'addImages'])->name('admin.addImages');
});