<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::resource('artikel', 'Article\ArticleController');
Route::get('/daftar_artikel', 'Article\ArticleController@admin_index')->name('admin.article');
Route::resource('kategori', 'Article\CategoryController');

