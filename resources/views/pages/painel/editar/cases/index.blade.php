@extends('base.painel.index')
@section('content')

      @component('pages.painel.editar.cases.componentes.formulario', ["case" => $case])
      @endcomponent

@endsection
