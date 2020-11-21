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
    return view('index');
});


Auth::routes();

Route::get('/logout','HomeController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

//ROUTE ADMIN
Route::group(['middleware' => ['auth','checkRole:0'],'prefix'=>'admin'], function(){
    Route::get('/profil', 'Admin\DashboardController@profilAdmin')->name('profilAdmin');
    Route::get('/data-guru','Admin\DashboardController@dataGuru')->name('dataGuru');
    Route::get('/data-guru/create','Admin\DashboardController@createGuru')->name('dataguruCreate');
    Route::post('/data-guru/store','Admin\DashboardController@storeGuru')->name('dataguruStore');
    Route::get('/data-siswa','Admin\DashboardController@dataSiswa')->name('dataSiswa');
    Route::get('/data-siswa/create','Admin\DashboardController@createSiswa')->name('datasiswaCreate');
    Route::post('/data-siswa/store','Admin\DashboardController@storeSiswa')->name('datasiswaStore');
  
});

//ROUTE GURU
Route::group(['middleware' => ['auth','checkRole:1'],'prefix'=>'guru'], function(){
    Route::get('/profil', 'Guru\DashboardController@profilGuru')->name('profilGuru');
  
});


//ROUTE SISWA

Route::group(['middleware' => ['auth','checkRole:2'],'prefix'=>'siswa'], function(){
Route::get('/profil', 'Siswa\DashboardController@profilSiswa')->name('profilSiswa');
});
