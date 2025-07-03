<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\GoogleFormController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ListDataTable;
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
    // return Redirect::to('googleform');
   return Redirect::route('googleform'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'googleform'], function () {
    Route::get('/',          [GoogleFormController::class, 'index'])->name('googleform');
    Route::get('/show',     [GoogleFormController::class, 'show'])->name('googleform.show');

    Route::post('/store',    [GoogleFormController::class, 'store'])->name('googleform.store');
    Route::post('/login',    [GoogleFormController::class, 'form_login'])->name('googleform.login');
    Route::post('/autosave', [GoogleFormController::class, 'autosave'])->name('googleform.autosave');    
});


Route::group(['middleware'=>['auth']], function() {

// Route::get('/form', [App\Http\Controllers\GoogleFormController::class, 'index'])->name('form.index');

Route::get('/datatable', [ListDataTable::class, 'index'])->name('datatable.index');
Route::post('/datatable/list', [ListDataTable::class, 'list'])->name('datatable.list');
Route::post('/datatable/answers', [ListDataTable::class, 'show'])->name('answers.show');

});