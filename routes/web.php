<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin/admin');
});



//Route DetailTiket
Route::get('/admin/detail', 'DetailtiketController@detail');

Route::post('/detailAction','DetailtiketController@add_Detail');

Route::get('/admin/detail/hapus/{id}','DetailtiketController@delete_Detail');

Route::get('/admin/detail/edit/{id}','DetailtiketController@edit_Detail');

Route::post('/admin/detail/update','DetailtiketController@detail_Update');

//Route mobil
Route::get('admin/mobil', 'MobilController@mobil');
Route::post('/mobilAction','MobilController@proses_upload');
Route::get('admin/mobil/hapus/{id}', 'MobilController@hapus');

//Route Pelanggan
Route::get('admin/pelanggan', 'PelangganController@pelanggan');
Route::post('/pelangganAction', 'PelangganController@add_Pelanggan');
Route::post('/pelangganUpdate', 'PelangganController@pelanggan_Update');
Route::get('admin/delete/{id}', 'PelangganController@delete_Pelanggan');

//Route coba upload file
Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@prosses_upload');
Route::get('/upload/hapus/{id}', 'UploadController@hapus');
