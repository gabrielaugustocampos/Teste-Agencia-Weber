<div class="container-fluid">
        <!-- Page Heading -->
        <h2 class="h3 mb-4 text-gray-800">Template Favicon</h2>
        <form id="form_cadastro_pagina" action="{{route('metas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="form-group" style="width: 100%;">
                    <div class="file-upload">
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
                                        <button type="button" onclick="alterarUpload()" class="btn btn-primary"><i
                                                class="fas fa-image"></i></button>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <script>
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