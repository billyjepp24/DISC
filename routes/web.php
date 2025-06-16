<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleFormController;
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

Route::get('/try', function () {
    return view('main');
});

Route::POST('/login', function () {
    return view('login');
});
Route::get('/googleform', [GoogleFormController::class, 'index'])->name('googleform.index');
Route::post('/googleform', [GoogleFormController::class, 'store'])->name('googleform.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
