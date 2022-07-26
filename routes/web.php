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
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\File;

// ROTAS SITE

Route::GET('/',  function () {
    return redirect('/painel');
});

Route::POST('/upload_image_ckeditor', 'PaginasController@upload')->name('upload.site');

// FIM ROTAS SITE


//todas as rotas de baixo são do painel administrativo
Auth::routes();

Route::group(['prefix' => 'painel',  'middleware' => ['auth']], function () {
  Route::get('/', 'DashboardController@index')->name('admin.dashboard');

  // CATEGORIAS
  Route::get('/categorias', 'CategoriaController@index')->name('categorias.index');
  Route::post('categorias/salvar', 'CategoriaController@store')->name('categorias.store');
  Route::get('/categorias/listar', 'CategoriaController@listar')->name('categorias.listar');
  Route::get('/categorias/editar/{id}', 'CategoriaController@editar')->name('categorias.editar');
  Route::post('/categorias/salvar{id}', 'CategoriaController@salvar_edit')->name('categorias.salvar_edit');
  Route::post('/categorias/deletar', 'CategoriaController@deletar')->name('categorias.deletar');
  // FIM CATEGORIAS
  

});



// rotas produtos
Route::get('/produtos', 'ProdutosController@listar')->middleware('auth');
Route::get('/cadastro_produtos', 'ProdutosController@cadastro_produtos_tela')->middleware('auth');
Route::post('/cadastro_produtos/cadastro', 'ProdutosController@cadastro_produtos_banco');
Route::get('/produtos/editar/{id}', 'ProdutosController@editar')->middleware('auth');
Route::post('/produtos/alterar_status/localizacao', 'ProdutosController@alterar_status_produto');




Route::post('/paginas/listar/paginas/id', 'PaginasController@listar_paginas_id');

Route::post('/paginas/remover_imagem', 'PaginasController@remove_image');
Route::delete('/paginas/remover_icone/{id}', 'PaginasController@remove_icone');



// rotas galeria
Route::get('/galeria', 'GaleriaController@galeria')->middleware('auth');
Route::post('/galeria/alterar_status', 'GaleriaController@alterar_status_galeria');
Route::post('/galeria/cadastro/localizacao', 'GaleriaController@cadastro_localizacao_galeria');
Route::post('/galeria/editar/titulo', 'GaleriaController@galeria_editar_titulo');

//rotas Fotos
Route::get('/fotos/{id}', 'FotosController@index')->middleware('auth');
Route::post('/cadastro/fotos', 'FotosController@cadastro_fotos');
Route::post('/editar/foto/titulo', 'FotosController@editar_titulo');
Route::post('/excluir/foto/', 'FotosController@excluir_foto');
Route::get('/logout', 'Auth\LoginController@logout');
