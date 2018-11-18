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




Auth::routes();

 Route::get('/', array(
     'as' => 'home',
     'uses' => 'HomeController@index'
));
Route::get('/home', array(
    'as' => 'home',
    'uses' => 'HomeController@index'
));
//Rutas del Coontrolador de Videos

Route::get('/crear-video', array(
    'as' => 'createVideo',
    'middleare' => 'auth',
    'uses' => 'VideoController@createVideo'
));

Route::post('/guardar-video', array(
    'as' => 'saveVideo',
    'middleare' => 'auth',
    'uses' => 'VideoController@saveVideo'
));
Route::get('/mini/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'VideoController@getImage'
));


Route::get('/video/{id}', array(
    'as' => 'detalleVideo',
    'uses' => 'VideoController@getVideoPage'
));

Route::get('/video-file/{filename}', array(
    'as' => 'fileVideo',
    'uses' => 'VideoController@getVideo'

));


Route::post('/comment', array(
    'as' => 'comment',
    'middleware' => 'auth',
    'uses' => 'CommentController@store'
));

Route::get('/delete-comment/{comment_id}', array(
    'as' => 'commentDelete',
    'middleware' => 'auth',
    'uses' => 'CommentController@delete'
));

Route::get('/delete-video/{video_id}', array(
    'as' => 'videoDelete',
    'middleware' => 'auth',
    'uses' => 'VideoController@deletes'
));

Route::get('/editar-video/{slug}', array(
    'as' => 'videoEdit',
    'middleware' => 'auth',
    'uses' => 'VideoController@edit'
));

Route::post('/update-video/{video_id}', array(
    'as' => 'videoUpdate',
    'middleware' => 'auth',
    'uses' => 'VideoController@update'
));


Route::get('/buscar/{search?}' ,[
        'as' => 'videoSearch',
        'uses' => 'VideoController@search'
]);


//canal usuario

Route::get('/canal/{slug}',array(
        'as' => 'channel',
        'uses' => 'UserController@channel'
));


Route::get('/canal-u/{slug}',array(
    'as' => 'perfil',
    'uses' => 'UserController@perfil'
));

//editar perfil 

Route::get('/editar-Perfil/{slug}', array(
    'as' => 'editarPerfil',
    'uses' => 'UserController@editarPerfil'
));

Route::post('/update-perfil/{slug}', array(
    'as' => 'perfilUpdate',
    'middleware' => 'auth',
    'uses' => 'UserController@updatePerfil'
));

//LIKES


Route::get('/like/{id}','VideoController@like');