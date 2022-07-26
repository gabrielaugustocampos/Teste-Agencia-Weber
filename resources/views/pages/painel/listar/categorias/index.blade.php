@extends('base.painel.index')
@section('content')

  @component('pages.painel.listar.categorias.components.listar_cat', ['categorias' => $categorias])
  @endcomponent

@endsection
