<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartController;
use App\Http\Controllers\AdminPartController;

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdminCategoriesController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminBookController;

use App\Http\Controllers\MyauthController;

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

Route::get('/', [PartController::class, 'index']);
Route::get('/parts/{part}', [PartController::class, 'show'])->whereAlphaNumeric('part');
Route::get('/parts/{part}/categories/{category}', [CategoriesController::class, 'show'])->whereAlphaNumeric('part', 'category');
Route::get('/parts/{part}/categories/{category}/{book}', [BookController::class, 'show'])->whereAlphaNumeric('part', 'category', 'book');

Route::get('/admin/login', [MyauthController::class, 'form']);
Route::post('/admin/login', [MyauthController::class, 'login']);

Route::resource('/admin/parts', AdminPartController::class)->whereAlphaNumeric('part')->middleware('myauth');
Route::resource('/admin/categories', AdminCategoriesController::class)->whereAlphaNumeric('category')->middleware('myauth');
Route::resource('/admin/books', AdminBookController::class)->whereAlphaNumeric('book')->middleware('myauth');

