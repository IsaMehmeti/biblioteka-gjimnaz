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





Route::get('/', 'DashboardController@index')->middleware('auth')->name('dashboard');
Route::get('/profile', function () { return view('profile.profile');})->name('profile');



/*--------------------------------------------------------------------------
| Route per: Autoret, Kategorite, Studentet, Librat, Huazimet , Arkivat 
|-------------------------------------------------------------------------*/
Route::resource('authors','AuthorController')->middleware('auth');
Route::resource('categories','CategoryController')->middleware('auth');
Route::resource('students','StudentController')->middleware('auth');
Route::resource('books','BookController')->middleware('auth');
Route::resource('borrows','BorrowController')->middleware('auth');
Route::get('arkivat','BorrowController@archive')->name('archive.index')->middleware('auth');
Route::post('borrows/active/{id}/{type}','BorrowController@active')->name('borrows.active')->middleware('auth');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register', 'DashboardController@index')->middleware('auth');
Route::get('edit/user', 'UserController@edit')->name('user.edit');
Route::post('update/user', 'UserController@update')->name('user.update');

Route::get('/xxx' , function(){

	echo bcrypt('12345678');
});