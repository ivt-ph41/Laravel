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
Route::get('/', function(){
        return view('welcome');
});
Route::get('users/restore' , 'UserController@recovery');
// Route::get('users/store' , function(){
//         $data = [
//                 'username' => 'Quangg',
//                 'email' => 'add33@gmail.com',
//                 'password' => bcrypt('1111111'),
//                 'gender' => 1,
//                 'phone' => '3456567553',
//                 'country_id' => 1
//         ];
//         \App\User::create($data);
//         return 'success';
// });


Route::get('/set-location', function(\Illuminate\Http\Request $request) {
        $locate = $request->lang;
        // app()->setLocale($locate);
        session(['my_locale' => $locate]);
        return redirect()->back();
});
Route::get('/test-join', function () {
        \DB::enableQueryLog();
        // $user = \DB::select('select * from users where username = ? or email = ? ',[$name, $email]);
        $users = \DB::table('users')
        ->join('profiles', function($join){
                $join->on('users.id', '=', 'profiles.user_id')
                        ->where('profiles.age' , '>', 40);
        })->select('users.*',
        'profiles.id as profile_id',
        'profiles.age',
        'profiles.address')->get();
        // dd(\DB::getQueryLog());
        dd($users);
});

Route::get('/test-where', function(){
        \DB::enableQueryLog();
        
        $profiles = \DB::table('profiles')
        ->whereBetween('age', [20, 40])
        ->get();
        dd(\DB::getQueryLog());

        dd($profiles);
});
Route::get('/test-eloquent-update', function(){
        \DB::enableQueryLog();
        
        $profile = \App\Profile::find(1);
        // dd(\DB::getQueryLog());
        $profile->update(['age' =>10]);

        dd($profile);
});
Route::get('/test-skip-take', function(){
        \DB::enableQueryLog();
        
        $profile = \DB::table('profiles')->skip(10)->take(10)->get();
        // dd(\DB::getQueryLog());

        dd($profile);
});
// Route::get('/users', 'UserController@index')->name('users.index');
// Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::group(['prefix' => 'admin',
              'as' => 'admin.',
              'namespace' => 'User',
              'middleware' => ['is.admin']
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
Route::resource('categories', 'CategoryController');
Route::get('/users/{id}/edit', 'UserController@edit')->middleware('is.owner');
Route::resource('users', 'UserController');
// Route::get('/{name}/{email}', function ($name, $email) {
//         // \DB::enableQueryLog();
//         // $user = \DB::select('select * from users where username = ? or email = ? ',[$name, $email]);
//         $users = \DB::table('users')
//                         ->join('profiles', function($join){
//                                 $join->on('users.id', '=', 'profiles.user_id');
//                         })->get();
//         // dd(\DB::getQueryLog());
//         dd($user);
// });

Route::get('/users/{id}/set-role/{roleID}', 'UserController@setRole');
Route::get('/users/{id}/delete-role/{roleID?}', 'UserController@deleteRole');
Route::get('/users/{id}/sync-role/{roleID}', 'UserController@syncRole');
Route::get('/users/{id}/roles', 'UserController@getRoles');
Route::get('/countries/{id}/posts', 'CountryController@listPosts');
Route::get('/countries/{id}', 'CountryController@show')->middleware('is.admin');
Route::get('/products/{id}/images', 'ProductController@getImages');
Route::get('/posts/{id}/images', 'PostController@getImages');
Route::get('/images/{id}', 'ImageController@getOwner');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
