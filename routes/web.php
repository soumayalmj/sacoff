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


// user
Route::get('/inscription_uti', 'UsersController@inscription')->name('inscription_user');
Route::post('/inscription_uti_post', 'UsersController@inscription_post')->name('inscription_user_post');

Route::get('generate_qr_code', 'UsersController@generate_qr_code')->name('generate_qr_code');

Route::get('/connexion', 'UsersController@connexion')->name('connexion');
Route::post('/connexion_post', 'UsersController@connexion_post')->name('connexion_post');

// ENTREPRISE
Route::get('/inscription_ent', 'EntreprisesController@inscription')->name('inscription_entreprise');
Route::post('/inscription_post', 'EntreprisesController@inscription_post')->name('inscription_entreprise_post');

