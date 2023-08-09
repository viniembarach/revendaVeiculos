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

Route::group(['middleware' => 'auth'], function (){ //encapsular a rota

Route::group(['prefix'=>'pessoas', 'where'=>['id'=>'[0-9]+']], function() {
    Route::any('',             ['as'=>'pessoas',          'uses'=>'PessoasController@index'   ]);
    Route::get('create',       ['as'=>'pessoas.create',   'uses'=>'PessoasController@create'  ]);
    Route::post('store',       ['as'=>'pessoas.store',    'uses'=>'PessoasController@store'   ]);
    Route::get('destroy',      ['as'=>'pessoas.destroy',  'uses'=>'PessoasController@destroy' ]);
    Route::get('edit',         ['as'=>'pessoas.edit',     'uses'=>'PessoasController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'pessoas.update',   'uses'=>'PessoasController@update'  ]);
});

Route::group(['prefix'=>'cidades', 'where'=>['id'=>'[0-9]+']], function(){

    Route::any('',             ['as'=>'cidades',          'uses'=>'cidadesController@index'   ]);
    Route::get('create',       ['as'=>'cidades.create',   'uses'=>'cidadesController@create'  ]);
    Route::post('store',       ['as'=>'cidades.store',    'uses'=>'cidadesController@store'   ]);
    Route::get('destroy',      ['as'=>'cidades.destroy',  'uses'=>'cidadesController@destroy' ]);
    Route::get('edit',         ['as'=>'cidades.edit',     'uses'=>'cidadesController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'cidades.update',   'uses'=>'cidadesController@update'  ]);
});

Route::group(['prefix'=>'fabricantes', 'where'=>['id'=>'[0-9]+']], function(){

    Route::any('',             ['as'=>'fabricantes',          'uses'=>'fabricantesController@index'   ]);
    Route::get('create',       ['as'=>'fabricantes.create',   'uses'=>'fabricantesController@create'  ]);
    Route::post('store',       ['as'=>'fabricantes.store',    'uses'=>'fabricantesController@store'   ]);
    Route::get('destroy',      ['as'=>'fabricantes.destroy',  'uses'=>'fabricantesController@destroy' ]);
    Route::get('edit',         ['as'=>'fabricantes.edit',     'uses'=>'fabricantesController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'fabricantes.update',   'uses'=>'fabricantesController@update'  ]);
});

Route::group(['prefix'=>'tipo_veiculos', 'where'=>['id'=>'[0-9]+']], function(){

    Route::any('',             ['as'=>'tipo_veiculos',          'uses'=>'tipo_veiculosController@index'   ]);
    Route::get('create',       ['as'=>'tipo_veiculos.create',   'uses'=>'tipo_veiculosController@create'  ]);
    Route::post('store',       ['as'=>'tipo_veiculos.store',    'uses'=>'tipo_veiculosController@store'   ]);
    Route::get('destroy',      ['as'=>'tipo_veiculos.destroy',  'uses'=>'tipo_veiculosController@destroy' ]);
    Route::get('edit',         ['as'=>'tipo_veiculos.edit',     'uses'=>'tipo_veiculosController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'tipo_veiculos.update',   'uses'=>'tipo_veiculosController@update'  ]);
});

Route::group(['prefix'=>'veiculos', 'where'=>['id'=>'[0-9]+']], function(){

    Route::any('',             ['as'=>'veiculos',          'uses'=>'veiculosController@index'   ]);
    Route::get('create',       ['as'=>'veiculos.create',   'uses'=>'veiculosController@create'  ]);
    Route::post('store',       ['as'=>'veiculos.store',    'uses'=>'veiculosController@store'   ]);
    Route::get('destroy',      ['as'=>'veiculos.destroy',  'uses'=>'veiculosController@destroy' ]);
    Route::get('edit',         ['as'=>'veiculos.edit',     'uses'=>'veiculosController@edit'    ]);
    Route::put('{id}/update',  ['as'=>'veiculos.update',   'uses'=>'veiculosController@update'  ]);
});

Route::group(['prefix'=>'vendas', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',             ['as'=>'vendas',            'uses'=>'vendasController@index'     ]);
    Route::get('create',       ['as'=>'vendas.create',     'uses'=>'vendasController@create'    ]);
    Route::post('store',       ['as'=>'vendas.store',      'uses'=>'vendasController@store'     ]);
    Route::get('edit',         ['as'=>'vendas.edit',       'uses'=>'vendasController@edit'      ]);
    Route::put('{id}/update',  ['as'=>'vendas.update',     'uses'=>'vendasController@update'    ]);
    Route::get('destroy',      ['as'=>'vendas.destroy',    'uses'=>'vendasController@destroy'   ]);
});

});
