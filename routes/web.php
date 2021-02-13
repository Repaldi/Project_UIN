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

Route::get('/', 'FrontEnd\HomeController@index')->name('index');
Route::get('/tentang', 'FrontEnd\HomeController@tentang')->name('tentang');
Route::get('/kontak', 'FrontEnd\HomeController@hubungiKami')->name('hubungiKami');




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

    //route untuk get latihan_siswa per latihan
    Route::get('/hasil-latihan_siswa-per-latihan/{id}','Guru\LatihanController@getLatihanSiswaPerLatihan')->name('getLatihanSiswaPerLatihan');
    Route::get('hasil-latihan/{id}','Guru\LatihanController@showHasilLatihan')->name('showHasilLatihan');
    Route::get('/e-book/delete/{id}','Guru\EbookController@deleteEbook')->name('deleteEbook');

    Route::post('/latihan','Guru\LatihanController@storeLatihan')->name('storeLatihan');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/petunjuk','Guru\PetunjukController@index')->name('petunjuk');
    Route::post('/petunjuk','Guru\PetunjukController@storePetunjuk')->name('storePetunjuk');
    Route::get('/kd&tujuan','Guru\KDTujuanController@index')->name('kdTujuan');
    Route::post('/kd&tujuan','Guru\KDTujuanController@storeKDTujuan')->name('storeKDTujuan');
    Route::get('/latihan','Guru\SoalController@getLatihan')->name('getLatihan');
    Route::post('/buatSoal','Guru\SoalController@storeSoal')->name('storeSoal');
    Route::patch('/buatSoal','Guru\SoalController@updateSoal')->name('updateSoal');
    Route::get('/materi','Guru\MateriController@materi')->name('materi');
    Route::post('/materi','Guru\MateriController@storeMateri')->name('storeMateri');
    Route::patch('/materi','Guru\MateriController@updateMateri')->name('updateMateri');
    Route::get('/quiz','Guru\QuizController@index')->name('getQuiz');
    Route::post('/quiz','Guru\QuizController@storeSoalQuiz')->name('storeSoalQuiz');
    Route::patch('/quiz','Guru\QuizController@updateSoalQuiz')->name('updateSoalQuiz');

    Route::get('/create-quiz','Siswa\QuizController@createQuiz');

    Route::get('/create-latihan','Siswa\LatihanController@createLatihan');

    Route::get('/forum', 'Guru\ForumController@forum')->name('forum');
    Route::post('/store/forum', 'Guru\ForumController@storeForum')->name('storeForum');
    Route::get('forum/{id}','Guru\ForumController@showForum')->name('showForum');
    Route::post('/store/forumJawab', 'Guru\ForumController@storeForumJawab')->name('storeForumJawab');

    Route::get('/e-book','Guru\EbookController@getEbook')->name('getEbook');
    Route::post('/e-book','Guru\EbookController@storeEbook')->name('storeEbook');
    Route::patch('/e-book','Guru\EbookController@updateEbook')->name('updateEbook');


});

Route::get('pagination/fetch_data','Siswa\QuizController@fetch_data');
Route::get('store/quiz_jawab','Siswa\QuizController@jawabQuiz')->name('jawabQuiz');
Route::get('quiz/check','Siswa\QuizController@checkQuiz');
Route::get('quiz/finish/{quiz_siswa_id}','Siswa\QuizController@finishQuiz')->name('finishQuiz');

Route::get('latihan/fetch_data','Siswa\LatihanController@fetch_data_latihan');
Route::get('store/latihan_jawab','Siswa\LatihanController@jawabLatihan')->name('jawabLatihan');
Route::get('latihan/check','Siswa\LatihanController@checkLatihan');
Route::get('latihan/finish/{latihan_siswa_id}','Siswa\LatihanController@finishLatihan')->name('finishLatihan');


Route::group(['middleware' => ['auth','checkRole:2'],'prefix'=>'siswa'], function(){
    Route::get('/profil', 'Siswa\DashboardController@profilSiswa')->name('profilSiswa');
    Route::post('/profil','Siswa\DashboardController@storeProfilSiswa')->name('storeProfilSiswa');
    Route::patch('/profil/{id}/update','Siswa\DashboardController@updateProfilSiswa', ['$id' =>'id'])->name('updateProfilSiswa');

    Route::get('/quiz/{quiz_siswa_id}','Siswa\QuizController@getQuizSiswa')->name('getQuizSiswa');
    //latihan
    Route::get('/latihan/{latihan_siswa_id}','Siswa\LatihanController@getLatihanSiswa')->name('getLatihanSiswa');
});
