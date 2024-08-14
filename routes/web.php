<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\Website\MywebsiteController;
use App\Http\Controllers\Website\SliderController;


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


Route::get('/', [MywebsiteController::class, 'home'])->name('welcome');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('jobtitles', JobTitleController::class);
});

Route::prefix('mywebsite')->group(function () {
    Route::get('sliders', [SliderController::class, 'index'])->name('mywebsite.sliders.index');
    Route::get('sliders/create', [SliderController::class, 'create'])->name('mywebsite.sliders.create');
    Route::post('sliders', [SliderController::class, 'store'])->name('mywebsite.sliders.store');
    Route::get('sliders/{slider}', [SliderController::class, 'edit'])->name('mywebsite.sliders.edit');
    Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('mywebsite.sliders.update');
    Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('mywebsite.sliders.destroy');
});