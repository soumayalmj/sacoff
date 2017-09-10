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
    return view('pages/index');
});
// Email confirmation 
Route::get('confirmation/resend', 'Auth\RegisterController@resend');
Route::get('confirmation/{id}/{confirmation_code}', 'Auth\RegisterController@confirm');

Auth::routes();

Route::get('/acheter_sacs', ['as' => 'acheter_sacs', function () {
    return view('pages/utilisateur/acheter_sacs');
}]);

Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
    // Notifications
    Route::resource('notification', 'NotificationsController', ['names' => [
    'store' => 'notification.send' ]]
    );
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/qrcode/{id}', 'UsersController@generateQrCode')->name('qrcode');
