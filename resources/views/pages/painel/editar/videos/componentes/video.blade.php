<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Cadastro de Vídeos</h1>
  <form id="form_cadastro_pagina" action="{{route('videos.update', ["id" => $video->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="row alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row" style="display: flex;flex-direction: row;justify-content: center;">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Titulo</label>
            <input type="text" class="form-control form-control-user" value="{{!empty($video->titulo) ? $video->titulo : ''}}" name="titulo" placeholder="Titulo do vídeo">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Descrição</label>
            <input type="text" class="form-control form-control-user" value="{{!empty($video->descricao) ? $video->titulo : ''}}" name="descricao" placeholder="Descrição do vídeo">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleFormControlSelect1">URL vídeo</label>
            <input type="text" class="form-control form-control-user" name="url" value="{{!empty($video->url) ? 'https://www.youtube.com/watch?v='.$video->url : ''}}" placeholder="URL do vídeo">
        </div>
      </div>

      <div class="col-md-3 col-sm-12" style="display: flex;align-items: center;">
        <div class="form-group" style="width: 100%;">
          <button type="submit" class="btn btn-info" style="width: 100%;">
            <i class="fas fa-folder-plus"></i> Salvar
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
