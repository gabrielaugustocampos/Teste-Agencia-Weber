<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
      $user = Auth::user();
      $categorias = Categoria::select('id', 'nome', 'descricao')->where('excluido', 0)->get();
      return view('pages.painel.dashboard.index', compact("user", "categorias"));
    }

    public function produtos($id){

      $user = Auth::user();
      $categorias = Categoria::select('id', 'nome', 'descricao')->where('excluido', 0)->get();

      $produtos = Produtos::join('tb_categorias_tb_texto', 'tb_produtos.id_produto', '=', 'tb_categorias_tb_texto.id_texto_cat')
                          ->select('tb_produtos.id_produto', 'tb_produtos.nome', 'tb_produtos.preco', 'tb_produtos.imagem', 'tb_produtos.texto', 'tb_categorias_tb_texto.id_categoria')
                          ->where('tb_categorias_tb_texto.id_categoria', $id)
                          ->where('tb_produtos.excluido', '0')
                          ->get();

      return view('pages.painel.dashboard.index', compact("user", "categorias", "produtos", 'id'));
    }
}
