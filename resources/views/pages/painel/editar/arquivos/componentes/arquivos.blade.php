<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Editar Arquivos</h1>
    <form id="form_cadastro_pagina" action="{{route('arquivos.update', ['id' => $arquivo->id])}}" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control form-control-user" name="titulo"
                        value="{{!empty($arquivo->titulo) ? $arquivo->titulo : ''}}" placeholder="Titulo do arquivo">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Descrição</label>
                    <input type="text" class="form-control form-control-user" name="descricao"
                        value="{{!empty($arquivo->descricao) ? $arquivo->descricao : ''}}"
                        placeholder="Descrição do arquivo">
                </div>
            </div>

            <div class="form-group" style="width: 100%;" id="imagem">
                <div class="file-upload">
                    <label style="text-align: center;" for="exampleFormControlSelect1">Imagem</label>
                    <input id="input_upload_imagem" style="display:none;" type='file' name="imagem" accept="image/*">
                    @if (empty($arquivo->imagem))
                    <div class="image-upload-wrap">
                        <div class="col-md-12 col-sm-12">
                            <div class="file-upload-input"></div>
                            <div class="drag-text">
                                <h3 style="">Selecione uma imagem</h3>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="file-upload-content" style="flex-wrap: wrap;display: block;">
                        <div class="col-md-12 col-sm-12">
                            <img class="file-upload-image" src="{{asset('imagens_arquivos').'/'.$arquivo->imagem}}"
                                alt="your image" />
                            <div id="nome_imagem"></div>
                        </div>
                        <div class="align_btn_img">
                            <div class="col-md-12 col-sm-12">
                                <div class="image-title-wrap">
                                    <button type="button" onclick="alterarUpload()" class="btn btn-primary"><i
                                            class="fas fa-image"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    @endif

                </div>
            </div>

            <div class="form-group" style="width: 100%;" id="arquivo">

                <div class="file-upload">
                    <label style="text-align: center;" for="exampleFormControlSelect1">Arquivo</label>
                    <input id="input_upload_arquivo" style="display:none;" type='file' name="arquivo"
                        accept="application/pdf">
                    @if (empty($arquivo->imagem))
                    <div class="image-upload-wrap">
                        <div class="col-md-12 col-sm-12">
                            <div class="file-upload-input"></div>
                            <div class="drag-text">
                                <h3 style="">Selecione um arquivo</h3>
                            </div>
                        </div>
                    </div>
                    @else

                    <div class="file-upload-content" style="flex-wrap: wrap;display: block;">
                        <div class="col-md-12 col-sm-12">
                            <a href="{{asset('arquivos').'/'.$arquivo->arquivo}}" target="_blank">
                                <i class="fas fa-file-pdf fa-4x"></i>
                                <div id="nome_imagem"></div>
                            </a> 
                        </div>
                        <div class="align_btn_img" style="padding-top:1pc;">
                            <div class="col-md-12 col-sm-12">
                                <div class="image-title-wrap">
                                    <button type="button" onclick="alterarUpload_arquivo()" class="btn btn-primary"><i
                                            class="fas fa-image"></i></button>
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
  
    $(document).on("click","#imagem .image-upload-wrap",function() {
      $('#imagem #input_upload_imagem').click();
      // $('.image-upload-wrap').hide();
    });
    $(document).on("ready","#imagem #input_upload_imagem",function(e) {
      if(e.target.files.length == 0) {
        $('#imagem .file-upload-image').attr('src', '');
        $('#imagem .file-upload-content').show();
        $('#imagem #input_upload_imagem').val('');
  
      } else {
        $('#nome_imagem').html(e.target.files[0].name);
        $('#imagem .file-upload-image').attr('src', URL.createObjectURL(event.target.files[0]));
        $('#imagem .image-upload-wrap').hide();
  
        $('#imagem .file-upload-content').show();
      }
    });
    $(document).on("change","#imagem #input_upload_imagem",function(e) {
      if(e.target.files.length == 0) {
        $('#imagem .file-upload-image').attr('src', '');
        $('#imagem .file-upload-content').show();
        $('#imagem .file-upload-content').hide();
        $('#imagem #input_upload_imagem').val('');
  
      } else {
        $('#imagem #nome_imagem').html(e.target.files[0].name);
        $('#imagem .file-upload-image').attr('src', URL.createObjectURL(event.target.files[0]));
        $('#imagem .image-upload-wrap').hide();
  
        $('#imagem .file-upload-content').show();
      }
    });
  
    function alterarUpload() {
      $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('#input_upload_imagem').click();
    }
</script>


<!-- /.container-fluid -->
<script type="text/javascript">
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      
        $(document).on("click","#arquivo .image-upload-wrap",function() {
          $('#arquivo #input_upload_arquivo').click();
          // $('.image-upload-wrap').hide();
        });
        $(document).on("ready","#arquivo #input_upload_arquivo",function(e) {
          if(e.target.files.length == 0) {
            $('#arquivo .file-upload-image').attr('src', '');
            $('#arquivo .file-upload-content').show();
            $('#arquivo #input_upload_arquivo').val('');
      
          } else {
            $('#nome_imagem').html(e.target.files[0].name);
            $('#arquivo .file-upload-image').attr('src', URL.createObjectURL(event.target.files[0]));
            $('#arquivo .image-upload-wrap').hide();
      
            $('#arquivo .file-upload-content').show();
          }
        });
        $(document).on("change","#arquivo #input_upload_arquivo",function(e) {
          if(e.target.files.length == 0) {
            $('#arquivo .file-upload-image').attr('src', '');
            $('#arquivo .file-upload-content').show();
            $('#arquivo .file-upload-content').hide();
            $('#arquivo #input_upload_arquivo').val('');
      
          } else {
            $('#arquivo #nome_imagem').html(e.target.files[0].name);
            $('#arquivo .image-upload-wrap').hide();
      
            $('#arquivo .file-upload-content').show();
          }
        });
      
        function alterarUpload_arquivo() {
          $('#arquivo .file-upload-input').replaceWith($('#arquivo .file-upload-input').clone());
          $('#input_upload_arquivo').click();
        }
</script>