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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', "HomeController@index");

    Route::group(['prefix' => 'lantinmaker' , 'namespace' => 'Admin'] , function (){
        require base_path('routes/admin.php');
    });

    Route::group(['prefix' => 'user' , 'namespace' => 'User'] , function (){
        require base_path('routes/user.php');
    });

    Route::group(['prefix' => 'school' , 'namespace' => 'School'] , function (){
        require base_path('routes/school.php');
    });

    Route::group(['prefix' => 'blog' , 'namespace' => 'Blog'] , function (){
        require base_path('routes/blog.php');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
