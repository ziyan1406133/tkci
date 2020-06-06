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
Auth::routes();

Route::get('/', 'DashboardController@homepage')->name('homepage');
Route::get('/contact', 'DashboardController@contact')->name('contact');

Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

Route::resource('artikel', 'Article\ArticleController');
Route::get('/daftar_artikel', 'Article\ArticleController@admin_index')->name('admin.artikel');
Route::get('/cari_artikel', 'Article\ArticleController@search')->name('search.article');
Route::get('/admin_search_artikel', 'Article\ArticleController@admin_search')->name('admin.search.artikel');
Route::get('/daftar_artikel/{username}', 'Article\ArticleController@admin_article_index')->name('admins.article');
Route::get('/artikel_author/{username}', 'Article\ArticleController@article_index')->name('authors.article');
Route::get('/artikel_saya', 'Article\ArticleController@my_articles')->name('my.articles');
Route::get('/draft_saya', 'Article\ArticleController@my_drafts')->name('my.drafts');

Route::resource('kategori', 'Article\CategoryController');
Route::get('/tanpa_kategori', 'Article\CategoryController@tanpa_kategori')->name('tanpa.kategori');

Route::resource('seller', 'Accessory\SellerController');
Route::get('/daftar_seller', 'Accessory\SellerController@admin_index')->name('admin.seller');

Route::resource('aksesoris', 'Accessory\AccessoryController');
Route::get('/daftar_aksesoris', 'Accessory\AccessoryController@admin_index')->name('admin.aksesoris');

Route::resource('admin', 'UserController');
Route::get('/author/{username}', 'UserController@show_author')->name('author.show');

Route::resource('gallery', 'Gallery\GalleryController');
Route::get('/lihat_gallery', 'Gallery\GalleryController@admin_index')->name('admin.gallery');
Route::get('/lihat_gallery/{slug}', 'Gallery\GalleryController@admin_show')->name('admin.show.gallery');
Route::resource('image', 'Gallery\ImageController');

Route::resource('cabang', 'Branch\BranchController');
Route::get('/daftar_cabang', 'Branch\BranchController@admin_index')->name('admin.cabang');
Route::get('/peta_cabang', 'Branch\BranchController@branch_map')->name('peta.cabang');
Route::get('/admin_peta_cabang', 'Branch\BranchController@admin_branch_map')->name('peta.cabang.admin');

Route::resource('donasi', 'Branch\DonationController');
Route::get('/daftar_donasi', 'Branch\DonationController@admin_index')->name('admin.donation');
Route::put('/hapus_donasi/{id}', 'Branch\DonationController@hapus_donasi')->name('donasi.hapus');

Route::resource('message', 'MessageController');

Route::get('/json-kabupaten','WilayahController@kabupaten');
Route::get('/json-kecamatan', 'WilayahController@kecamatan');