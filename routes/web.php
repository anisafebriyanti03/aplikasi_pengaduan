<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('landing');
});


//login&regis
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/simpanregister','LoginController@simpanregister')->name('simpanregister');
//email
Route::get('/email/verify', function (){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth','signed'])->name('verification.verify');


Route::post('/getkabupaten', 'LoginController@getkabupaten')->name('getkabupaten');
Route::post('/getkecamatan', 'LoginController@getkecamatan')->name('getkecamatan');
Route::post('/getdesa', 'LoginController@getdesa')->name('getdesa');


Route::post('/getkbptn', 'PetugasController@getkbptn')->name('getkbptn');
Route::post('/getkcmtn', 'PetugasController@getkcmtn')->name('getkcmtn');
Route::post('/getds', 'PetugasController@getds')->name('getds');

Route::group(['middleware'=> ['auth','ceklevel:admin,petugas']], function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
});

Route::group(['middleware'=> ['auth','ceklevel:admin,petugas']], function(){
   
    //tanggapan
    // Route::get('/tanggapan', 'TanggapanController@index')->name('tanggapan');
    // Route::get('/tanggapan/create', 'TanggapanController@create');
    // Route::post('/tanggapan/store', 'TanggapanController@store');
    // Route::get('/tanggapan/edit/{id}', 'TanggapanController@edit');
    // Route::put('/tanggapan/update/{id}', 'TanggapanController@update');
    // Route::get('/tanggapan/show/{id}', 'TanggapanController@show');
    // Route::get('/tanggapan/destroy/{id}', 'TanggapanController@destroy');

    //petugas
    // Route::get('/petugas', 'PetugasController@index')->name('petugas');
    // Route::get('/petugas/create', 'PetugasController@create');
    // Route::post('/petugas/store', 'PetugasController@store');
    // Route::get('/petugas/show/{id}', 'PetugasController@show');
    // Route::get('/petugas/destroy/{id}', 'PetugasController@destroy');

    //edit dan update tanggapan
    // Route::get('petugas/tanggapan/edit/{id}', 'PetugasController@edittanggapan');
    // Route::put('petugas/tanggapan/update/{id}', 'PetugasController@updatetanggapan');
    
    //cetak
    Route::get('/petugas/pengaduan/pdf', 'PetugasController@pdf');
    Route::get('/pengaduan/formcetak', 'PetugasController@formcetak');
    Route::get('/pengaduan/cetakpertanggal/{tglawal}/{tglakhir}', 'PetugasController@cetakpertanggal')->name('pengaduan.cetak');


    //data pengaduan
    Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
    
    // Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit');
    Route::get('/pengaduan/show/{id}', 'PengaduanController@show');
    Route::post('/pengaduan/show/{id}', 'TanggapanController@store');
    Route::put('/pengaduan/update/{id}', 'PengaduanController@update');
    Route::get('/pengaduan/destroy/{id}', 'PengaduanController@destroy');
    Route::post('/pengaduan/show/onchange/{id}', 'PengaduanController@statusOnchange')->name('pengaduan.statusOnchange');
   
    // Route::get('/pengaduan/destroy/{id}', 'TanggapanController@destroy');

    //tampildata masyarakat
    Route::get('/masyarakats', 'UserController@index')->name('masyarakats');
    Route::get('/masyarakats/show/{id}', 'UserController@show');
    Route::get('/masyarakats/destroy/{id}', 'UserController@destroy');
    
 
});


// Route::get('/pengaduan/detailLaporan/{id}', 'PengaduanController@detailLaporan');
// Route::get('/pengaduan/detail/{id_pengaduan}',' TanggapanController@create');
// Route::post('/pengaduan/detail/{id_pengaduan}',' TanggapanController@store');
// Route::get('/tanggapanPetugas/{id}', 'TanggapanController@tanggapan');


Route::group(['middleware'=> ['auth','ceklevel:masyarakat']], function(){
    Route::get('/masyarakat','DashboardController@masyarakat')->name('masyarakat');
    Route::get('/pengaduan/create', 'PengaduanController@create');
    Route::post('/pengaduan/store', 'PengaduanController@store');
    Route::get('/laporanku','DashboardController@laporanku');
    Route::get('/detailLaporan/{id}', 'DashboardController@detailLaporan');
    Route::get('/masyarakat/{id}', 'DashboardController@createNotification');
    //user profile
    Route::get('/user', 'UserprofileController@index')->name('user');
    Route::get('/user/edit', 'UserprofileController@edit_profileuser')->name('profile.edit');
    Route::put('/user/update', 'UserprofileController@update_profileuser')->name('profile.update');
    
});

Route::group(['middleware'=> ['auth','ceklevel:admin']], function(){
   //petugas
   Route::get('/petugas', 'PetugasController@index')->name('petugas');
   Route::get('/petugas/create', 'PetugasController@create');
   Route::post('/petugas/store', 'PetugasController@store');
   Route::get('/petugas/show/{id}', 'PetugasController@show');
   Route::get('/petugas/destroy/{id}', 'PetugasController@destroy');
});

//userprofile
// Route::get('/user_profile', 'UserprofileController@index')->name('user_profile');
// Route::post('getKota', 'UserprofileController@getKota')->name('getKota');//getkota
// Route::post('getKecamatan', 'UserprofileController@getKecamatan')->name('getKecamatan');//getkemacatan
// Route::post('getKelurahan', 'UserprofileController@getKelurahan')->name('getKelurahan');//getkelurahan


//userprofile petugas

Route::get('/petugas-profile', 'UserprofileController@petugas')->name('petugas.profile');
Route::get('/petugas-profile/edit', 'UserprofileController@edit_profilepetugas')->name('petugas.edit');
Route::put('/petugas-profile/update', 'UserprofileController@update_profilepetugas')->name('petugas.update');

//edit profile nyoba


// Route::resource('/pengaduan', 'UserController');
// Route::get('pengaduan', 'UserController@lihat');