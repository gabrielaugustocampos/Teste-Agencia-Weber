@extends('base.painel.index')
@section('content')

      @component('pages.painel.editar.segmentos.componentes.formulario', ["segmento" => $segmento, "videos_sem_selecionar" => $videos_sem_selecionar, "cases_sem_selecionar" => $cases_sem_selecionar])
      @endcomponent

@endsection
