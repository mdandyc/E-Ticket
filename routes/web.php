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


Route::get('/', 'RuteController@home');

Route::get('/404', function () {
    return view('404');
});
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

//report
Route::get('admin/costumer/pdf', 'ReportController@pdf1');
Route::get('admin/reservation/pdf', 'ReportController@pdf2');
Route::get('admin/rute/pdf', 'ReportController@pdf3');
Route::get('admin/transportasi/pdf', 'ReportController@pdf4');
Route::get('admin/transportasitype/pdf', 'ReportController@pdf5');
Route::get('admin/user/pdf', 'ReportController@pdf6');
//admin
Route::resource('admin/costumer', 'CostumerController');
Route::get('costumer/search','CostumerController@search');
Route::resource('admin/transportasitype', 'TransportationTypeController');
Route::get('transportasitype/search','TransportationTypeController@search')->name('transportasitype.search');
Route::resource('admin/transportasi', 'TransportationController');
Route::get('transportation/search','TransportationController@search')->name('user.search');
Route::resource('admin/rute', 'RuteController');
Route::get('/rute/search','RuteController@search2')->name('rute.search');
Route::get('/search','RuteController@search')->name('rute.search');
Route::resource('admin/reservation', 'ReservationController');
Route::get('reservation/search','ReservationController@search');
Route::resource('admin/user', 'UserController');
Route::get('user/search','UserController@search')->name('user.search');

//User
Route::resource('user/reservation','User\ReservationController');
Route::POST('/search/create','User\ReservationController@store')->name('reservation.store');
Route::GET('user/{user}','UserController@edit')->name('user.edit');
Route::resource('user','User\UserController');
Route::GET('user/costumer/{costumer}','User\CostumerController@edit')->name('costumer.edit');
Route::resource('user/costumer','User\CostumerController');
Auth::routes();

