@extends('base.painel.index')
@section('content')

  @if (isset($produtos))
    @if (isset($id))

      @component('pages.painel.cadastro.produtos.componentes.cadastro_produtos', ["produtos" => $produtos, "id" => $id, "icones" => $icones, "cat_sem_selecionar" => $cat_sem_selecionar])
      @endcomponent

    @else

      @component('pages.painel.cadastro.produtos.componentes.cadastro_produtos', ["produtos" => $produtos, "cat_sem_selecionar" => $cat_sem_selecionar])
      @endcomponent

    @endif

  @else

    @component('pages.painel.cadastro.produtos.componentes.cadastro_produtos', ['categorias' => $categorias])
    @endcomponent

  @endif

@endsection
