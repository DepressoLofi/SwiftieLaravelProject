<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [SwiftieController::class, 'registerPage'])->name('swiftie#register');

Route::post('/register', [SwiftieController::class, 'register'])->name('register');

Route::get('list', [SwiftieController::class, 'listPage'])->name('swiftie#list');

