<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\SwiftieController;
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


// Swiftie Api
Route::get("/swifties", [SwiftieController::class, 'getSwiftie']);
Route::post("/swifties", [SwiftieController::class, 'storeSwiftie']);

//Blog Crud api

Route::get("/blogs", [BlogController::class, 'get_blogs']);
Route::get("/blogs/{id}", [BlogController::class, 'get_blog']);
Route::post("/blogs", [BlogController::class, 'create_blog']);
Route::put('/blogs/{id}/update', [BlogController::class, 'update_blog']);
Route::delete('/blogs/{id}', [BlogController::class, 'delete_blog']);
