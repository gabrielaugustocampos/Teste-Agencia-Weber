<?php

namespace App\Http\Controllers;

use App\Icone;
use App\Produtos;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProdutosController extends Controller
{
    public function listar()
    {
        $categorias = Categoria::select('id', 'nome')->where('excluido', 0)->get();
        $produtos = Produtos::select('id_produto', 'nome', 'preco', 'texto', 'excluido')->get();
    
        $user = Auth::user();

        return view('pages.painel.listar.produtos.index', compact('produtos', 'user', 'categorias'));
    }


    public function listar_produtos_id(Request $req)
    {
        // dd($req);
        if ($req->valor_filtro == "none" && $req->id_categoria == "none") {

            $produtos = Produtos::select('id_produto', 'nome', 'preco', 'texto', 'excluido')->get();

        } else if ($req->valor_filtro == "none" && $req->id_categoria != "none") {

            $produtos = Produtos::join('tb_categorias_tb_texto', 'tb_produtos.id_produto', '=', 'tb_categorias_tb_texto.id_texto_cat')
                            ->select('tb_produtos.id_produto', 'tb_produtos.nome', 'tb_produtos.preco', 'tb_produtos.texto', 'tb_produtos.excluido', 'tb_categorias_tb_texto.id_categoria')
                            ->where('tb_categorias_tb_texto.id_categoria', $req->id_categoria)
                            ->get();
                            
                            //dd($produtos);

        } else if ($req->valor_filtro != "none" && $req->id_categoria == "none") {

            $produtos = Produtos::select('id_produto', 'nome', 'preco', 'texto', 'excluido')->where('excluido', $req->valor_filtro)->get();

        } else {
            $produtos = Produtos::join('tb_categorias_tb_texto', 'tb_produtos.id_produto', '=', 'tb_categorias_tb_texto.id_texto_cat')
                            ->select('tb_produtos.id_produto', 'tb_produtos.nome', 'tb_produtos.preco', 'tb_produtos.texto', 'tb_produtos.excluido', 'tb_categorias_tb_texto.id_categoria')
                            ->where('tb_categorias_tb_texto.id_categoria', $req->id_categoria)
                            ->where('tb_produtos.excluido', $req->valor_filtro)
                            ->get();
        }

        $categorias = Categoria::select('id', 'nome')->where('excluido', 0)->get();
        return view('pages.painel.listar.produtos.componentes.tabela_ajax', compact('categorias', 'produtos'));

    }

    public function alterar_status_produto(Request $req)
    {
        $produto = Produtos::find($req->id_produto);
        if ($produto->excluido == 0) {
            $produto->excluido = 1;
        } else {
            $produto->excluido = 0;
        }

        $produto->save();

        
        $produtos = Produtos::select('id_produto', 'nome', 'preco', 'texto', 'excluido')->get();
        
        $categorias = Categoria::where('excluido', 0)->get();
       

        return view('pages.painel.listar.produtos.componentes.tabela_ajax', compact( 'produtos', 'categorias'));

    }

    public function cadastro_produtos_tela()
    {
        $categorias = Categoria::select('id', 'nome')->where('excluido', 0)->get();
        $user = Auth::user();

        return view('pages.painel.cadastro.produtos.index', compact('user', 'categorias'));
    }

    public function cadastro_produtos_banco(Request $req)
    {
        // dd($req->files);
        //  $this->validate($req, [
        //     'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $validator = Validator::make($req->all(), [
            'imagem.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $exists = false;

        if ($validator->passes()) {
            if (!isset($req->id_edit)) {
                $produto = new Produtos;
            } else {
                $produto = Produtos::find($req->id_edit);
                $exists = true;
            }
            if ($req->categorias == "none") {

                return back()->with('error', 'Selecione uma localização!');

            } else {


                if ($req->hasFile('imagem')) {
                    $image = $req->file('imagem');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/imagens_produtos');
                    $image->move($destinationPath, $name);
                } else {
                    if (!empty($produto->imagem)) {
                        $name = $produto->imagem;
                    } else {
                        $name = null;
                    }
                }
                $produto->nome = $req->nome_produto;
                $produto->preco = str_replace(',', '.', $req->preco);
                $produto->texto = $req->editor1;
                $produto->imagem = $name;

                // dd($pagina->imagem);
                $produto->save();

                $produto->categorias()->sync($req->categorias);

                if (!empty($req->input('icons'))) {
                    $produto->saveIcons($req->input('icons'));
                }

                return back()->with('success', 'Cadastro Efetuado com sucesso!');

            }

        } else {
            return back()->with('error', 'Erro! Este arquivo não é uma imagem ou seu tamanho é maior que 2MB');

        }

    }

    public function upload(Request $request)
    {
        $CKEditor = $_GET['CKEditor'];
        $funcNum = $_GET['CKEditorFuncNum'];
        $message = 
        $url = '';
          
            if ($request->hasFile('upload')) {
                $file = $request->file('upload');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/ckeditor/plugins/image/images/', $filename);
                $url = url('/ckeditor/plugins/image/images/' .  $filename);
                // dd($url);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        
        return '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
    }

    public function editar($id)
    {

        $produtos = Produtos::where('id_produto', $id)->with(['categorias' => function($query) {
            $query->where('tb_categorias.excluido', 0);
        }])->first();
        $user = Auth::user();
        $icones = Produtos::where('id_produto', $id)->with('icones')->firstOrFail()->icones;
        $cat_sem_selecionar = Categoria::whereNotIn('id', $produtos->categorias->pluck('id'))->where('excluido', 0)->get();

        return view('pages.painel.cadastro.produtos.index', compact('produtos', 'id', 'user', 'icones', 'cat_sem_selecionar'));
    }

    public function remove_image(Request $req)
    {
        $produtos = Produtos::select('id_produto', 'imagem', 'excluido')->find($req->id_produto);
        $produtos->imagem = null;
        // dd($produtos);
        $produtos->save();
        
        $id = $req->id_produto;
        return view('pages.painel.cadastro.produtos.componentes.formulario_ajax', compact('produtos', 'id'));
    }

    public function remove_icone($id)
    {
        $deletedRows = Icone::where('id', $id)->delete();

        return response('removido com sucesso');

    }
}
