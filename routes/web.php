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

// Route::get('/', function () {
// //   dd(Auth::user()->level);
//     return view('login');
// });

Route::get('/','AuthControler@wellcome')->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('login','LoginController@loginShow')->name('login');
// Route::get('loginSession','LoginController@loginSession')->name('loginSession');
Route::post('loginStore','LoginController@loginStore')->name('loginStore');

Route::get('register','RegisterController@registerShow')->name('register');
Route::post('registerStore','RegisterController@registerStore')->name('registerStore');

Route::get('logout', 'LoginController@logout')->name('logout');



Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard','AdminController@index')->name('admin.dashboard');
    Route::get('/siswa','SiswaController@index')->name('siswa');
    Route::post('/siswa','SiswaController@store')->name('siswa.store');

    Route::delete('siswa/{siswa}/delete','SiswaController@destroy')->name('siswa.delete');
    Route::get('/siswa/{id}/edit','SiswaController@edit')->name('siswa.edit');
    Route::PATCH('/siswa/{id}/update', 'SiswaController@update')->name('siswa.update');
});

Route::middleware('user')->group(function () {
    Route::get('user/dashboard','UserController@index')->name('user.dashboard');
});
