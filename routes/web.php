<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleFormController;
use App\Http\Controllers\AnswerController;
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
    return Redirect::to('login');
});

Route::get('/datatable', function () {
    return view('datatable');
});
// // Route::POST('/login', function () {
//     return view('login');
// });
Route::get('/googleform', [GoogleFormController::class, 'index'])->name('googleform.index');
Route::post('/googleform/store', [GoogleFormController::class, 'store'])->name('googleform.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [App\Http\Controllers\GoogleFormController::class, 'index'])->name('form.index');