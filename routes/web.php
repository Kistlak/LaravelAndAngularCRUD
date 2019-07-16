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

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/ForLoopPage','ForLoopController@ForLoopPage')->name('ForLoopPage');

Route::post('/CountFromNumbers','ForLoopController@CountFromNumbers')->name('CountFromNumbers');

Route::get('/LoopTheInputsPage','ForLoopController@LoopTheInputsPage')->name('LoopTheInputsPage');

Route::post('/LetsLoop','ForLoopController@LetsLoop')->name('LetsLoop');

Route::get('FormWithJson','ForLoopController@FormWithJsonPage')->name('FormWithJson');

Route::post('GetFormData','ForLoopController@GetFormData')->name('GetFormData');

Route::get('SetDataToTable','ForLoopController@SetDataToTable')->name('SetDataToTable');

Route::post('UpdateData','ForLoopController@UpdateData')->name('UpdateData');

Route::post('DeleteData','ForLoopController@DeleteData')->name('DeleteData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
