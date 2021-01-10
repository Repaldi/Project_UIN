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

Route::get('/', 'FrontEnd\HomeController@index')->name('index');
Route::get('/tentang', 'FrontEnd\HomeController@tentang')->name('tentang');
Route::get('/kontak', 'FrontEnd\HomeController@hubungiKami')->name('hubungiKami');



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
    Route::post('/profil','Guru\DashboardController@storeProfilGuru')->name('storeProfilGuru');
    Route::patch('/profil/{id}/update','Guru\DashboardController@updateProfilGuru', ['$id' =>'id'])->name('updateProfilGuru');

});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/petunjuk','Guru\PetunjukController@index')->name('petunjuk');
    Route::post('/petunjuk','Guru\PetunjukController@storePetunjuk')->name('storePetunjuk');
    Route::get('/kd&tujuan','Guru\KDTujuanController@index')->name('kdTujuan');
    Route::post('/kd&tujuan','Guru\KDTujuanController@storeKDTujuan')->name('storeKDTujuan');
    Route::get('/buatSoal','Guru\SoalController@index')->name('buatSoal');
    Route::post('/buatSoal','Guru\SoalController@storeSoal')->name('storeSoal');
    Route::patch('/buatSoal','Guru\SoalController@updateSoal')->name('updateSoal');
    Route::get('/materi','Guru\MateriController@materi')->name('materi');
    Route::post('/materi','Guru\MateriController@storeMateri')->name('storeMateri');
    Route::patch('/materi','Guru\MateriController@updateMateri')->name('updateMateri');
});

//ROUTE SISWA

Route::group(['middleware' => ['auth','checkRole:2'],'prefix'=>'siswa'], function(){
Route::get('/profil', 'Siswa\DashboardController@profilSiswa')->name('profilSiswa');
});
