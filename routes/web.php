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

Route::get('/', [
    'uses' => 'SekolahController@index',
    'as' => 'sekolah'
]);
Route::get('/data', [
    'uses' => 'SekolahController@data',
    'as' => 'sekolah.data'
]);
Route::get('/form-unggah', [
    'uses' => 'SekolahController@create',
    'as' => 'sekolah.form_unggah'
]);
Route::post('/unggah', [
    'uses' => 'SekolahController@store',
    'as' => 'sekolah.unggah'
]);
Route::get('/unduh-excel', [
    'uses' => 'SekolahController@exportExcel',
    'as' => 'sekolah.unduh_excel'
]);
