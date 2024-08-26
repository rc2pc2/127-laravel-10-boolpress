<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\HomeController as GuestHomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [GuestHomeController::class, 'index'])->name('home');
Route::get('/contact', [LeadController::class, 'create'])->name('leads.create');
Route::post('/contact', [LeadController::class, 'store'])->name('leads.store');

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(function(){
        Route::resource("/posts", AdminPostController::class);
        Route::resource("/categories", AdminCategoryController::class);
    }
);

