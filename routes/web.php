<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SwiftieController;

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

//Swiftie List
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [SwiftieController::class, 'registerPage'])->name('swiftie#register');

Route::post('/register', [SwiftieController::class, 'register'])->name('register');

Route::get('/list', [SwiftieController::class, 'listPage'])->name('swiftie#list');


//blog view
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blogs/{id}', [BlogController::class, "show"])->name('blogs.Show');

//Admin BLogs
//create

Route::get('admin/blogs/create', [BlogController::class, 'create'])->name('blogs.adminCreate');

Route::post('admin/blogs', [BlogController::class, 'store'])->name('blogs.adminStore');


//read

Route::get('admin/blogs', [BlogController::class, 'adminIndex'])->name('blogs.adminIndex');

//update

Route::get('admin/blogs/{id}/edit', [BlogController::class, "adminEdit"])->name('blogs.adminEdit');

Route::post('admin/blogs/{id}', [BlogController::class, "adminUpdate"])->name('blogs.adminUpdate');


//delete
Route::delete('admin/blogs/{id}', [BlogController::class, 'adminDestroy'])->name('blogs.adminDestroy');
