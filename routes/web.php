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

// Route::get('/users', 'UserController@index')->name('users.index');
// Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::group(['prefix' => 'admin',
              'as' => 'admin.',
              'namespace' => 'User',
            //   'middleware' => 'isAdmin'
], function(){ 

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/{id}', 'UserController@show')->name('users.show');
});

Route::get('users/{id}/forgot-pass', 'UserController@forgotPass')
        ->name('users.forgot-pass');
Route::post('users/{id}/forgot-pass', 'UserController@sendEmailResetPass')
        ->name('users.send-mail');
Route::get('/users/{id}/password-reset', 'UserController@resetPass')
        ->name('users.reset-pass')
        ->middleware('signed');