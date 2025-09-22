<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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





Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function(){

    Route::get('/home', [

        'uses' => 'HomeController@index',
        'as'   =>'home'

        ]);

    Route::get('/posts/create',[

        'uses'=> 'PostController@create',
        'as'  =>  'posts.create'
    ]);

    Route::post('/posts/store',[

        'uses'=> 'PostController@store',
        'as'  =>  'posts.store'
    ]);

    Route::get('/posts/delete/{id}',[

        'uses'=> 'PostController@destroy',
        'as'  =>  'posts.delete'
    ]);

    Route::get('/posts',[

        'uses'=> 'PostController@index',
        'as'  =>  'posts'
    ]);

    Route::get('/posts/trashed',[

        'uses'=> 'PostController@trashed',
        'as'  =>  'posts.trashed'
    ]);

    Route::get('/posts/kill/{id}',[

        'uses' => 'PostController@kill',
        'as'  =>  'posts.kill'
    ]);

    Route::get('/posts/restore/{id}',[

        'uses' => 'PostController@restore',
        'as'  =>  'posts.restore'
    ]);

    Route::get('/posts/edit/{id}',[
        'uses' => 'PostController@edit',
        'as'  =>  'posts.edit'
    ]);

    Route::post('/posts/update/{id}',[
        'uses' => 'PostController@update',
        'as'  =>  'posts.update'
    ]);

    Route::get('/categories/create',[
        'uses'=> 'CategoryController@create',
        'as'  =>  'categories.create'
    ]);

    Route::get('categories',[

        'uses'=> 'CategoryController@index',
        'as'  =>  'categories'
    ]);

    Route::post('/categories/store',[

        'uses'=> 'CategoryController@store',
        'as'  =>  'categories.store'
    ]);

    Route::get('/categories/edit/{id}',[

        'uses'=> 'CategoryController@edit',
        'as'  =>  'categories.edit'
    ]);

    Route::get('/categories/delete/{id}',[

        'uses'=> 'CategoryController@destroy',

        'as'  =>  'categories.delete'
    ]);

    Route::post('/categories/update/{id}',[

        'uses'=> 'CategoryController@update',
        'as'  =>  'categories.update'
    ]);

});


