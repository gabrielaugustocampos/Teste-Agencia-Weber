<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Categoria;
use Validator;

class CategoriaController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('pages.painel.cadastro.categorias.index')->with([
            'user' => $user,
        ]);
    }

    public function store(Request $req) {
        Categoria::create([
            'nome' => $req->nome
        ]);

        return redirect()->back()->with('success', 'Cadastrado com sucesso');
    }

    public function listar() {
        $user = Auth::user();
        $categorias = Categoria::all();

        return view('pages.painel.listar.categorias.index')->with([
            'user' => $user,
            'categorias' => $categorias
        ]);
    }

    public function editar($id) {
        $user = Auth::user();
        $categoria = Categoria::where('id', $id)->first();

        return view('pages.painel.editar.categorias.index')->with([
            'user' => $user,
            'categoria' => $categoria
        ]);
    }

    public function salvar_edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string'
        ]);

        if($validator->passes()) {
            $categoria = Categoria::find($id);
            $categoria->nome = $request->input('nome');
            $categoria->save();

            return back()->with([
                'success' => 'Modificado com sucesso'
                ]);
        }
        else {
            return back()->with(['error' => 'Ocorreu um erro']);
        }
    }

    public function deletar(Request $request) {
        $categoria_status = Categoria::find($request->id_categoria);

        if($categoria_status->excluido == 0) {
            $categoria_status->excluido = 1;
        } else {
            $categoria_status->excluido = 0;
        }
        $categoria_status->save();
        
        $categorias = Categoria::all();

        return view('pages.painel.listar.categorias.components.listar_cat_ajax')->with([
            'categorias' => $categorias
        ]);
    }
}
