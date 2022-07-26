@extends('base.painel.index')
@section('content')

      @component('pages.painel.editar.videos.componentes.video', ["video" => $video])
      @endcomponent

@endsection
