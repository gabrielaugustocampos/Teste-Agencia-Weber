   @csrf
   @if (isset($id))
     <input type="hidden" name="id_edit" value="{{$id}}">
   @endif
   @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
    @elseif (session()->has('error'))
      <div class="alert alert-danger">
          {{ session()->get('error') }}
      </div>
  @endif
  <div class="row" style="display: flex;flex-direction: row;justify-content: center;">
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Titulo</label>
        @if (!empty($pagina->titulo))
          <input type="text" class="form-control form-control-user" value="{{$pagina->titulo}}" name="titulo_pagina" placeholder="Titulo da Página">
        @else
          <input type="text" class="form-control form-control-user" name="titulo_pagina" placeholder="Titulo da Página">
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Descrição</label>
        @if (!empty($pagina->descricao))
          <input type="text" class="form-control form-control-user" value="{{$pagina->descricao}}" name="descricao_pagina" placeholder="Descrição da Página">
        @else
          <input type="text" class="form-control form-control-user" name="descricao_pagina" placeholder="Descrição da Página">
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">URL Externa</label>
        @if (!empty($pagina->url))
          <input type="text" class="form-control form-control-user" value="{{$pagina->url}}" name="url_pagina" placeholder="URL Externa">
        @else
          <input type="text" class="form-control form-control-user" name="url_pagina" placeholder="URL Externa">
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Localização</label>
        @if (!empty($pagina->localizacao))
          <select class="form-control" id="id_localizacao_cadastro" name="id_localizacao_cadastro">
            <option value="none">Selecione uma Localização</option>
            @foreach ($localizacao as $item)
              @if ($item->id_localizacao_texto == $pagina->localizacao)
                <option selected value="{{$item->id_localizacao_texto}}">{{$item->nome}}</option>
              @else
                <option value="{{$item->id_localizacao_texto}}">{{$item->nome}}</option>
              @endif
            @endforeach
          </select>
        @else
          <select class="form-control" id="id_localizacao_cadastro" name="id_localizacao_cadastro">
            <option selected value="none">Selecione uma Localização</option>
            @foreach ($localizacao as $item)
                <option value="{{$item->id_localizacao_texto}}">{{$item->nome}}</option>
            @endforeach
          </select>
        @endif

      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Galeria</label>
        @if (!empty($pagina->galeria))
          <select class="form-control" name="id_localizacao_galeria_cadastro">
            <option value="none">Selecione uma Galeria</option>
            @foreach ($localizacao_galeria as $item)
              @if ($item->id_localizacao_galeria == $pagina->galeria)
                <option selected value="{{$item->id_localizacao_galeria}}">{{$item->nome}}</option>
              @else
                <option value="{{$item->id_localizacao_galeria}}">{{$item->nome}}</option>
              @endif
            @endforeach
          </select>
        @else
          <select class="form-control" name="id_localizacao_galeria_cadastro">
            <option selected value="none">Selecione uma Galeria</option>
            @foreach ($localizacao_galeria as $item)
              <option value="{{$item->id_localizacao_galeria}}">{{$item->nome}}</option>
            @endforeach
          </select>
        @endif
      </div>
    </div>
    <div class="container">
      <div class="row">
      <div class="form-group" style="width: 100%;">
        <div class="file-upload">
          <!-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button> -->
          @if (!empty($pagina->imagem))

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
                <img class="file-upload-image" src="{{asset('imagens_paginas').'/'.$pagina->imagem}}" alt="your image" />
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
                  <button type="button" id="btn_remove" class="btn btn-danger" value="{{$pagina->id_texto}}"><i class="fas fa-trash-alt"></i></button>
                </div>
              </div>
              </div>

            </div>

          @else

            {{-- <input id="input_upload_imagem" style="display:none;" type='file' name="imagem" accept="image/*">

            <div class="image-upload-wrap">
              <div class="file-upload-input"></div>
              <div class="drag-text">
                <h3 style="">Selecione uma imagem</h3>
              </div>
            </div>

            <div class="file-upload-content">
              <img class="file-upload-image" src="#" alt="your image" />
              <div id="nome_imagem"></div>
              <div class="image-title-wrap">
                <button type="button" class="remove-image" onclick="removeUpload()">Remove</button>
              </div>
            </div> --}}


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
                    {{-- <button type="button" class="remove-image" onclick="alterarUpload()"><i class="fas fa-image"></i></button> --}}
                  </div>
                </div>
                {{-- <div class="col-md-6 col-sm-6">
                  <div class="image-title-wrap">
                    <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </div> --}}

              </div>

            </div>

          @endif


        </div>
      </div>
    </div>
    </div>
    <div class="col-md-12 col-sm-12">
      <div class="form-group">
        @if (!empty($pagina))
          <textarea id="ckeditor" name="editor1" >{!!$pagina->texto!!}</textarea>
        @else
          <textarea id="ckeditor" name="editor1" ></textarea>
        @endif
        <script>
          // CKEDITOR.instances['editor1'].setData("value");
          let ckeditor_var = CKEDITOR.replace( 'editor1' );
        </script>
      </div>
    </div>
    <div class="col-md-3 col-sm-12" style="display: flex;align-items: center;">
      <div class="form-group" style="width: 100%;">
        <button id="btn_cadastra_pagina" type="button" class="btn btn-info" style="width: 100%;">
          <i class="fas fa-folder-plus"></i> Salvar
        </button>
      </div>
    </div>
  </div>
