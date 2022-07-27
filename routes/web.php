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
Route::post('/produtos/remover_imagem', 'ProdutosController@remove_image');
Route::post('/produtos/listar/produtos/id', 'ProdutosController@listar_produtos_id');
Route::delete('/paginas/remover_icone/{id}', 'ProdutosController@remove_icone');
Route::get('/produtos/{id}', 'DashboardController@produtos');
