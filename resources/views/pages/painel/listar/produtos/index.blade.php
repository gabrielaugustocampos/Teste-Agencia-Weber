@extends('base.painel.index')
@section('content')

  @component('pages.painel.listar.produtos.componentes.listar_produtos', ["categorias" => $categorias, "produtos" => $produtos])
  @endcomponent

@endsection
