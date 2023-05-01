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


Route::group(['prefix'=>'pessoas', 'where'=>['id'=>'[0-9]+']], function(){

    Route::get('',             ['as'=>'pessoas',          'uses'=>'PessoasController@index'   ]);
    Route::get('create',       ['as'=>'pessoas.create',   'uses'=>'PessoasController@create'  ]);
    Route::post('store',       ['as'=>'pessoas.store',    'uses'=>'PessoasController@store'   ]);
    Route::get('{id}/destroy', ['as'=>'pessoas.destroy',  'uses'=>'PessoasController@destroy' ]);
    Route::get('{id}/edit',    ['as'=>'pessoas.edit',     'uses'=>'PessoasController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'pessoas.update',   'uses'=>'PessoasController@update'  ]);
});

Route::group(['prefix'=>'cidades', 'where'=>['id'=>'[0-9]+']], function(){

    Route::get('',             ['as'=>'cidades',          'uses'=>'cidadesController@index'   ]);
    Route::get('create',       ['as'=>'cidades.create',   'uses'=>'cidadesController@create'  ]);
    Route::post('store',       ['as'=>'cidades.store',    'uses'=>'cidadesController@store'   ]);
    Route::get('{id}/destroy', ['as'=>'cidades.destroy',  'uses'=>'cidadesController@destroy' ]);
    Route::get('{id}/edit',    ['as'=>'cidades.edit',     'uses'=>'cidadesController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'cidades.update',   'uses'=>'cidadesController@update'  ]);
});

Route::group(['prefix'=>'fabricantes', 'where'=>['id'=>'[0-9]+']], function(){

    Route::get('',             ['as'=>'fabricantes',          'uses'=>'fabricantesController@index'   ]);
    Route::get('create',       ['as'=>'fabricantes.create',   'uses'=>'fabricantesController@create'  ]);
    Route::post('store',       ['as'=>'fabricantes.store',    'uses'=>'fabricantesController@store'   ]);
    Route::get('{id}/destroy', ['as'=>'fabricantes.destroy',  'uses'=>'fabricantesController@destroy' ]);
    Route::get('{id}/edit',    ['as'=>'fabricantes.edit',     'uses'=>'fabricantesController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'fabricantes.update',   'uses'=>'fabricantesController@update'  ]);
});

Route::group(['prefix'=>'tipo_veiculos', 'where'=>['id'=>'[0-9]+']], function(){

    Route::get('',             ['as'=>'tipo_veiculos',          'uses'=>'tipo_veiculosController@index'   ]);
    Route::get('create',       ['as'=>'tipo_veiculos.create',   'uses'=>'tipo_veiculosController@create'  ]);
    Route::post('store',       ['as'=>'tipo_veiculos.store',    'uses'=>'tipo_veiculosController@store'   ]);
    Route::get('{id}/destroy', ['as'=>'tipo_veiculos.destroy',  'uses'=>'tipo_veiculosController@destroy' ]);
    Route::get('{id}/edit',    ['as'=>'tipo_veiculos.edit',     'uses'=>'tipo_veiculosController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'tipo_veiculos.update',   'uses'=>'tipo_veiculosController@update'  ]);
});

