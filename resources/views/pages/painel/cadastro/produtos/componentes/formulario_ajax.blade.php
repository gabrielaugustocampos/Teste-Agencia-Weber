<div class="container">
  <div class="row">
    <div class="form-group" style="width: 100%;">
      <div class="file-upload">
        <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->
        @if (!empty($produtos->imagem))

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
              <img class="file-upload-image" src="{{asset('imagens_produtos/').$produtos->imagem}}" alt="your image" />
              <div id="nome_imagem"></div>
            </div>
            <div class="align_btn_img" style="width: 60%;display: flex;justify-content: center;">
            <div class="col-md-3 col-sm-6">
              <div class="image-title-wrap">
                <button type="button" onclick="alterarUpload()" class="btn btn-primary"><i class="fas fa-image"></i></button>
                {{-- <button type="button" class="remove-image" onclick="alterarUpload()"><i class="fas fa-image"></i></button> --}}
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="image-title-wrap">
                {{-- <button type="button" class="remove-image"><i class="fas fa-trash-alt"></i></button> --}}
                <button type="button" id="btn_remove" class="btn btn-danger" value="{{$produtos->id_produto}}"><i class="fas fa-trash-alt"></i></button>
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
  </div>
</div>
 
