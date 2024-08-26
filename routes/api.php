<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware("custom.api.auth")->name('api.')->group(function(){
    Route::get("/posts", [PostController::class, "index"] )->name('posts.index');
    Route::get("/posts/{post}", [PostController::class, "show"] )->name('posts.show');

    Route::get("/users", [UserController::class, "index"] )->name('users.index');
    Route::get("/users/search", [UserController::class, "userSearch"] )->name('users.search');
    Route::get("/users/{user}", [UserController::class, "show"] )->name('users.show');


    // Route::get("/categories", [CategoryController::class, "index"] )->name('categories.index');
    // Route::get("/categories/{category}", [CategoryController::class, "show"] )->name('categories.show');

    Route::patch("/categories/{category}/restore", [CategoryController::class, "restore"] )->name('categories.restore');
    Route::delete("/categories/{category}/permanent-delete", [CategoryController::class, "permanentDestroy"] )->name('categories.permanent-destroy');
    Route::resource("/categories", CategoryController::class)->except(["create", "edit"]);
});
