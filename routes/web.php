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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//User
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::get('/ListofRegistrattionUser',
    'UserController@index')->name('ListofRegisteredUser');
Route::get(
    '/UpdateUserForm/{id}',
    'ListofRegisteredUser@update'
)->name('EditUser');
Route::post(
    '/UpdateUserForm',
    'ListofRegisteredUser@store'
)->name('EditUser');
Route::post(
    '/DeleteUserForm',
    'ListofRegisteredUser@deleteUser'
)->name('DeleteUser');

