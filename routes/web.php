<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleFormController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ListDataTable;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ListDataTableApp;
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

Route::get('/applicants', [ApplicantsController::class, 'index'])->name('applicants');

Auth::routes();
Route::group(['middleware'=>['auth']], function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/googleform', [GoogleFormController::class, 'index'])->name('googleform');
Route::post('/googleform/store', [GoogleFormController::class, 'store'])->name('googleform.store');
Route::post('/googleform/login', [GoogleFormController::class, 'form_login'])->name('googleform.login');
Route::get('/googleform/show', [GoogleFormController::class, 'show']);
Route::post('/googleform/autosave', [GoogleFormController::class, 'autosave'])->name('googleform.autosave');


Route::post('/applicants/store', [ApplicantsController::class, 'store'])->name('applicants.store');
Route::post('/googleform-app/store-basic', [ApplicantsController::class, 'storeBasic'])->name('applicants.storeBasic');
Route::post('/googleform-app/autosave', [ApplicantsController::class, 'autosave'])->name('googleform-app.autosave');
Route::post('/googleform-app/store', [ApplicantsController::class, 'store'])->name('googleform-app.store');
Route::post('/googleform-app/fetch-answers', [ApplicantsController::class, 'fetchAnswers']);







// Route::get('/form', [App\Http\Controllers\GoogleFormController::class, 'index'])->name('form.index');

Route::get('/datatable', [ListDataTable::class, 'index'])->name('datatable.index');
Route::post('/datatable/list', [ListDataTable::class, 'list'])->name('datatable.list');
Route::post('/datatable/answers', [ListDataTable::class, 'show'])->name('answers.show');

Route::get('/datatable_app', [ListDataTableApp::class, 'index'])->name('datatable.index');
Route::post('/datatable_app/list', [ListDataTableApp::class, 'list'])->name('datatable.list');
Route::post('/datatable_app/answers', [ListDataTableApp::class, 'show'])->name('answers.show');

});