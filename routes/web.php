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
Route::get('/daftar_artikel', 'Article\ArticleController@admin_index')->name('admin.artikel');
Route::get('/admin_search_artikel', 'Article\ArticleController@admin_search')->name('admin.search.artikel');
Route::get('/daftar_artikel/{username}', 'Article\ArticleController@admin_article_index')->name('admins.article');
Route::get('/artikel_saya', 'Article\ArticleController@my_articles')->name('my.articles');
Route::get('/draft_saya', 'Article\ArticleController@my_drafts')->name('my.drafts');

Route::resource('kategori', 'Article\CategoryController');

Route::resource('seller', 'Accessory\SellerController');
Route::get('/daftar_seller', 'Accessory\SellerController@admin_index')->name('admin.seller');

Route::resource('aksesoris', 'Accessory\AccessoryController');
Route::get('/daftar_aksesoris', 'Accessory\AccessoryController@admin_index')->name('admin.aksesoris');

Route::resource('admin', 'UserController');

Route::resource('gallery', 'Gallery\GalleryController');
Route::get('/lihat_gallery', 'Gallery\GalleryController@admin_index')->name('admin.gallery');
Route::get('/lihat_gallery/{slug}', 'Gallery\GalleryController@admin_show')->name('admin.show.gallery');
Route::resource('image', 'Gallery\ImageController');

Route::resource('cabang', 'Branch\BranchController');
Route::get('/daftar_cabang', 'Branch\BranchController@admin_index')->name('admin.cabang');
Route::get('/lihat_cabang/{slug}', 'Branch\BranchController@admin_show')->name('admin.show.cabang');

Route::resource('donasi', 'Branch\DonationController');
Route::get('/daftar_donation', 'Branch\DonationController@admin_index')->name('admin.donation');
Route::get('/peta_cabang', 'Branch\DonationController@branch_map')->name('branch.map');

Route::get('/json-kabupaten','WilayahController@kabupaten');
Route::get('/json-kecamatan', 'WilayahController@kecamatan');