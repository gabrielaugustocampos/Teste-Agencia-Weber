@extends('base.painel.index')
@section('content')

      @component('pages.painel.editar.categorias.components.editar_cat', ['categoria' => $categoria])
      @endcomponent

@endsection
