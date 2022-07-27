@extends('base.painel.index')
@section('content')

  @if (isset($id))

    @component('pages.painel.dashboard.componentes.dashboard_produto', ['categorias' => $categorias, 'produtos' => $produtos])
    @endcomponent

  @else

    @component('pages.painel.dashboard.componentes.dashboard', ['categorias' => $categorias])
    @endcomponent

  @endif

@endsection
