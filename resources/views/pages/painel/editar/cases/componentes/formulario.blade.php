<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Cadastro de Página</h1>
  <form id="form_cadastro_pagina" action="{{route('cases.update', ["id" => $case->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
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
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Titulo</label>
          <input type="text" class="form-control form-control-user" value="{{!empty($case->titulo) ? $case->titulo : ''}}" name="titulo" placeholder="Titulo da case">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Descrição</label>
          <input type="text" class="form-control form-control-user" name="descricao" value="{{!empty($case->descricao) ? $case->descricao : ''}}" placeholder="Descrição da case">
        </div>
      </div>

      <div class="form-group" style="width: 100%;">
        <div class="file-upload">
          @if (!empty($case->imagem))

            <input id="input_upload_imagem" style="display:none;" type='file' name="imagem" accept="image/*">

            <div class="image-upload-wrap" style="display:none;">
              <div class="col-md-12 col-sm-12">
                <div class="file-upload-input"></div>
                <div class="drag-text">
                  <h3 style="">Selecione uma imagem</h3>
                </div>
              </div>
            </div>

            <div class="file-upload-content" style="display: flex;flex-wrap: wrap;justify-content: center;">
              <div class="col-md-12 col-sm-12">
                <img class="file-upload-image" src="{{asset('imagens_cases').'/'.$case->imagem}}" alt="your image" />
                <div id="nome_imagem"></div>
              </div>
              <div class="align_btn_img" style="width: 60%;display: flex;justify-content: center;">
                <div class="col-md-3 col-sm-6">
                  <div class="image-title-wrap">
                    <button type="button" onclick="alterarUpload()" class="btn btn-primary"><i class="fas fa-image"></i></button>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="image-title-wrap">

                    <button type="button" id="btn_remove" class="btn btn-danger" value="{{$case->id}}"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </div>
              </div>

            </div>

          @else

            <input id="input_upload_imagem" style="display:none;" type='file' name="imagem" accept="image/*">

            <div class="image-upload-wrap">
              <div class="col-md-12 col-sm-12">
                <div class="file-upload-input"></div>
                <div class="drag-text">
                  <h3 style="">Selecione uma imagem</h3>
                </div>
              </div>
            </div>

            <div class="file-upload-content" style="display: none;flex-wrap: wrap;">
              <div class="col-md-12 col-sm-12">
                <img class="file-upload-image" src="#" alt="your image" />
                <div id="nome_imagem"></div>
              </div>
              <div class="align_btn_img">
                <div class="col-md-12 col-sm-12">
                  <div class="image-title-wrap">
                    <button type="button" onclick="alterarUpload()" class="btn btn-primary"><i class="fas fa-image"></i></button>
                  </div>
                </div>
              </div>

            </div>

          @endif
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




<!-- /.container-fluid -->
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).on("click","#btn_remove",function() {
    let id_case = $(this).val();

    $.ajax({
      url: "{{route('cases.remover_imagem')}}",
      type: 'post',
      data:{
        _token: '{!! csrf_token() !!}',
        id_case:id_case,
      },
      success: function(result){
        $(".file-upload").empty();
        $(".file-upload").html(result);

      }
    });

  });

  $(document).on("click",".image-upload-wrap",function() {
    $('#input_upload_imagem').click();
    // $('.image-upload-wrap').hide();
  });
  $(document).on("ready","#input_upload_imagem",function(e) {
    if(e.target.files.length == 0) {
      $('.file-upload-image').attr('src', '');
      $('.file-upload-content').show();
      $('#input_upload_imagem').val('');

    } else {
      $('#nome_imagem').html(e.target.files[0].name);
      $('.file-upload-image').attr('src', URL.createObjectURL(event.target.files[0]));
      // $('#input_upload_imagem').val(URL.createObjectURL(event.target.files[0]));
      $('.image-upload-wrap').hide();

      $('.file-upload-content').show();
    }
  });
  $(document).on("change","#input_upload_imagem",function(e) {
    if(e.target.files.length == 0) {
      $('.file-upload-image').attr('src', '');
      $('.file-upload-content').show();
      $('.file-upload-content').hide();
      $('#input_upload_imagem').val('');

    } else {
      $('#nome_imagem').html(e.target.files[0].name);
      $('.file-upload-image').attr('src', URL.createObjectURL(event.target.files[0]));
      $('.image-upload-wrap').hide();

      $('.file-upload-content').show();
    }
  });

  function alterarUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('#input_upload_imagem').click();
  }
</script>
