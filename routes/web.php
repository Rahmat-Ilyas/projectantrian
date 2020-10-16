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
Route::resource('/userloket','userLoketController');
Route::resource('/loket','loketController');
Route::get('/loketdata/table','loketController@datatables')->name('table.loketdata');

Route::get('/loginUserLoket','userLoketController@indexLogin')->name('login.userLoket');
Route::post('/loginUserLoket/login','userLoketController@loginLoket')->name('loginloketAdd');
Route::get('/loginUserLoket/dashboard','userLoketController@dashboard')->name('loket.home');
Route::get('/loginUserLoket/logout','userLoketController@logoutLoket')->name('logoutLoket');

// REVISI

// change password
Route::put('/userloket/changepassword/{kode}','userLoketController@changepassword')->name('userloket.changepass');
// 

// Data antrian
Route::get('/data_antrian','userLoketController@indexdataantrian')->name('antrian.index');
Route::get('/data_antrian/table','userLoketController@DatatableAntrian')->name('antrian.table');

// REVISI AUTH
Route::get('/logins','customLoginController@getLogin')->middleware('guest');
Route::post('/logins','customLoginController@postLogin');
Route::get('/logouts','customLoginController@logouts');

Route::get('/admin',function(){
    return view('home');
})->middleware('auth:users');

Route::get('/userLoket',function(){
    return view('admin/authUserLoket/dashboard');
})->middleware('auth:userLoket');
// 

// END REVISI

Route::get('/userLoket/table','userLoketController@Datatable')->name('table.users');

Route::get('/display','displayController@index')->name('display.index');
Route::get('/display/office','displayController@office')->name('display.office');
Route::get('/display/time','displayController@timedisplay')->name('display.time');
Route::get('/display/videoForm','displayController@formvideoUpload')->name('video.form');
Route::post('/display/addvideoForm','displayController@updateVideo')->name('video.update');
Route::get('/display/getValue','displayController@getValueVideoControl')->name('display.getValue');
Route::post('/display/teskJalan','displayController@teskJalan')->name('teks.jalan');

// Ambil Nomor Antrian
Route::get('nomor-antrian', 'NomorAntrian@nomor_antrian');
Route::post('nomor-antrian', 'NomorAntrian@create_antrian');

// Loket Get Data
Route::post('get-data', 'loketController@config_data');

//Display Admin
Route::post('admin-config', 'myDisplayController@admin_config');
Route::post('display-config', 'myDisplayController@display_config');

// Demo
Route::get('/demo', function() {
    return view('demo');
});

Route::post('test-pusher', 'myDisplayController@test_pusher')->name('testPusher');
