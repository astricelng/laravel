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
/*
Route::get('/', function () {
    //return view('welcome', ['nombre' => 'Astrid']);

    //return view('welcome')->with('nombre','Astrid2');

    //return view('welcome')->withNombre('Astrid3');
    return view('welcome', ['nombre' => null]);
});


Route::get('/hola', function(){

	return "Hola !";

});


Route::get('/hola/mundo', function(){

	return "Hola mundo!";

});

Route::get('/hola/{nombre}', function($nombre){

	return "Hola {$nombre}";

});

Route::get('/hola/{nombre}', 'HolaController@hola');
*/


Route::name('posts_path')->get('/posts', 'PostsController@index');

Route::name('create_post_path')->get('/posts/create', 'PostsController@create');

Route::name('store_post_path')->post('/posts', 'PostsController@store');

Route::name('post_path')->get('/posts/{post}', 'PostsController@show');

