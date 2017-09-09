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

Route::get('/acheter_sacs', ['as' => 'acheter_sacs', function () {
    return view('pages/utilisateur/acheter_sacs');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ENTREPRISE
Route::get('/inscription_ent', 'EntreprisesController@inscription')->name('inscription_entreprise');
Route::post('/inscription_post', 'EntreprisesController@inscription_post')->name('inscription_entreprise_post');


// Email confirmation 
Route::get('confirmation/resend', 'Auth\RegisterController@resend');
Route::get('confirmation/{id}/{confirmation_code}', 'Auth\RegisterController@confirm');