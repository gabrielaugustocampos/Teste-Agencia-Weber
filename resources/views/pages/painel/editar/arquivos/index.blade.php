@extends('base.painel.index')
@section('content')

      @component('pages.painel.editar.arquivos.componentes.arquivos', ["arquivo" => $arquivo])
      @endcomponent

@endsection
