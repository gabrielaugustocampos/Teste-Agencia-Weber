<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Cadastro de Produto</h1>
  <form id="form_cadastro_produto" action="{{url('/cadastro_produtos/cadastro')}}" method="post" enctype="multipart/form-data">
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
          <label for="exampleFormControlSelect1">nome</label>
          @if (!empty($produtos->nome))
            <input type="text" class="form-control form-control-user" value="{{$produtos->nome}}" name="nome_produto" placeholder="Nome da Página">
          @else
            <input type="text" class="form-control form-control-user" name="nome_produto" placeholder="Nome da Produto">
          @endif
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Categorias</label>
          <select class="select_categorias" name="categorias[]" id="categorias" multiple="multiple" style="width:100%;">
            @if (isset($produtos))
              @foreach ($produtos->categorias as $categoria)
                <option selected value="{{$categoria->id}}">{{$categoria->nome}}</option>
              @endforeach
              @foreach ($cat_sem_selecionar as $categ)
                <option value="{{$categ->id}}">{{$categ->nome}}</option>  
              @endforeach    
            @else
            @foreach ($categorias as $categoria)
              <option value="{{$categoria->id}}">{{$categoria->nome}}</option>  
            @endforeach
            @endif
          </select>
        </div>
      </div>

       <div class="col-md-2" >
          <div class="panel panel-default" style="display: flex;align-items:center;flex-direction:column">
            <label for="exampleFormControlSelect1">Adicionar Ícone</label>
            <div class="panel-body">
              <div class="form-group">
                  <div class="">
                      <button type="button" class="icp icp-dd btn btn-primary add-icon fas fa-file-image" style="width : inherit; margin-top:6px; " >
                  </div>
                <div class="btn-group"  style="width: 100%;">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu"></div>
                </div>
              </div>
            </div>
          </div>

        </div>



      <div class="col-md-12 icons-container" style="display : {{!isset($icones) || empty($icones->first()) ? 'none' : ''}}">
            <div class="form-group">

              <label for="teste">Ícones</label>
              <div class="row" id="icons-container" style="display: flex;flex-direction: row;">
                  @if(isset($icones) && !empty($icones->first()))
                  @foreach ($icones as $icone)

                  <div class="col-md-3 single-icon" style="display: flex;justify-content: center;padding-bottom: 1pc;">
                      <div class="card" style="width: 80%;text-align: center;">
                      <div class="icons-info">
                      <h5 class="card-title" style="margin-top: 1pc;">{{$icone->titulo}}</h5>
                          <div class="text-xs font-weight-bold text-uppercase mb-1"><i class="{{$icone->codigo_icone}} fa-2x"></i></div>
                        </div>
                         <div class="card-body">
                          <div class="row" style="display: flex;flex-wrap: nowrap;">
                          <div class="col-md-6">  <button class="btn btn-danger icon-remove" icon_id="{{$icone->id}}"><i class="fas fa-trash-alt"></i></button> </div>
                          <div class="col-md-6"> <button class="btn btn-info icon-edit"><i class="fas fa-pen-square"></i></button> </div>
                          </div>
                          </div>
                        </div>
                       <input type="hidden" name="icons[{{$loop->index}}][titulo]" value="{{$icone->titulo}}">
                      <input type="hidden" name="icons[{{$loop->index}}][codigo_icone]" value="{{$icone->codigo_icone}}">
                      <input type="hidden" name="icons[{{$loop->index}}][descricao]" value="{{$icone->descricao}}">
                      <input type="hidden" name="icons[{{$loop->index}}][id]" value="{{$icone->id}}">
                  </div>
                  @endforeach

              @endif
            </div>
            </div>
        </div>


      <div class="container">
        <div class="row">
          <div class="form-group" style="width: 100%;">
            <div class="file-upload">
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
                    <img class="file-upload-image" src="{{asset('imagens_produtos').'/'.$produtos->imagem}}" alt="your image" />
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
      <div class="col-md-12 col-sm-12">
        <div class="form-group">
          @if (!empty($produtos))
            <textarea id="ckeditor" name="editor1" >{!!$produtos->texto!!}</textarea>
          @else
            <textarea id="ckeditor" name="editor1" ></textarea>
          @endif
          <script>
            teste = {!! JSON_ENCODE(public_path()) !!};
            console.log('2');
            CKEDITOR.replace( 'editor1', {
              filebrowserUploadUrl: "{{route('upload.site')}}",
            });
            
          </script>
        </div>
      </div>
      <input type="hidden" name="icone" id="input_icone" value="">
      <div class="col-md-3 col-sm-12" style="display: flex;align-items: center;">
        <div class="form-group" style="width: 100%;">
          <button id="btn_cadastra_pagina" type="button" class="btn btn-info" style="width: 100%;">
            <i class="fas fa-folder-plus"></i> Salvar
          </button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_cadastro_icone" tabindex="-1" role="dialog" aria-labelledby="titulo_modal_galeria" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
          <div class="modal-header modal-lg">
            <h5 class="modal-title" id="titulo_modal_banner">Cadastro de Galeria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form style="display: flex;flex-direction: column;width: 100%;"  action="/banner/cadastro" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="col-md-12 col-sm-12">
                <div class="form-group" style="text-align: center;">
                  <label for="exampleInputEmail1">Escolha o Icone:</label>
                  {{-- <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle  action-create"
                  data-selected="fa-car" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button> --}}

                <div class="btn-group" style="width:35%;">
                  <button type="button" class="btn btn-primary iconpicker-component"><i id="icon_selected"
                          class=""></i></button>
                  <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle action-create"
                          data-selected="fa-car" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu"></div>
              </div>
                <div class="dropdown-menu"></div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título</label>
                    <input type="text" class="form-control form-control-user" id="icons_title" name="icons_title">

                  </div>
                </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Descrição</label>
                  <textarea id="new_icon" name="icons_description"></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger save-icon" data-dismiss="modal">Cancelar</button>
              <button type=""  class="btn btn-primary save-icon">Salvar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal_update_icone" tabindex="-1" role="dialog" aria-labelledby="titulo_modal_galeria" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
          <div class="modal-header modal-lg">
            <h5 class="modal-title" id="titulo_modal_banner">Editar Icone</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form style="display: flex;flex-direction: column;width: 100%;"  action="/banner/cadastro" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="col-md-12 col-sm-12">
                <div class="form-group" style="text-align: center;">
                  <label for="exampleInputEmail1">Escolha o Icone:</label>
                  {{-- <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle  action-create"
                  data-selected="fa-car" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button> --}}

                <div class="btn-group" style="width:35%;">
                  <button type="button" class="btn btn-primary iconpicker-component"><i id="edit_icon"
                          class=""></i></button>
                  <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle action-create"
                          data-selected="fa-car" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu"></div>
              </div>
                <div class="dropdown-menu"></div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Título</label>
                    <input type="text" class="form-control form-control-user" id="edit_title" name="icons_title">
                  </div>
                </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Descrição</label>
                  <textarea id="edit_description" name="icons_description"></textarea>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type=""  class="btn btn-primary update-icon">Salvar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

  </form>
</div>


@if(isset($icones) && !empty($icones->first()))
<script>
    icons = {!! json_encode(count($icones)) !!};
 </script>
@elseif(!isset($icones) || empty($icones->first()))
<script>
    icons = 0;
 </script>
@endif
<script>

  $(document).ready(function() {
    $('.select_categorias').select2({
        placeholder: "Selecione suas categorias"
      }
    );
  });

  $(document).on('click', '.icon-remove',function(e){
    e.preventDefault();
    icons--;

    if(typeof $(this).attr('icon_id') !== "undefined"){

      $.ajax({
        url: `/paginas/remover_icone/${$(this).attr('icon_id')}`,
        type: 'DELETE',
        data:{
          _token: '{!! csrf_token() !!}'
        }
      });

    }

    $(this).closest('div.single-icon').remove();

    $('div.single-icon').each((index,data) => {
	    var prefix = "icons[" + index + "]";
	    $(data).find('input').each((index,data) => {
			element = $(data).get(0);

		 element.name =  element.name.replace(/icons\[\d+\]/, prefix);
    })
    });
  });

  $(document).on('click', '.icon-edit',function(e){
    e.preventDefault();
    that = $(this);

      icon = {
        name : undefined,
        description : undefined,
        code : undefined
      };

      if(typeof CKEDITOR.instances.edit_description === "undefined"){
        let ckeditor_icon = CKEDITOR.replace( 'edit_description' );
      }

      $(that).closest('div.single-icon').find('input[type="hidden"]').each((index,icons_attributes) => {


        if(index === 0){
          $("#edit_title").val($(icons_attributes).val());
        }else if(index === 1){
          icon.code =  $(icons_attributes).val();
          $("#edit_icon").addClass(icon.code);
        }else if(index === 2){
          CKEDITOR.instances.edit_description.setData( $(icons_attributes).val());

        }
      });



      $("#modal_update_icone").modal('show');

  });

  $(document).on('click', '.update-icon', function(e){

e.preventDefault();

if(typeof icon !== 'undefined'){

  icon.name = $("#edit_title").val();
  icon.description = CKEDITOR.instances.edit_description.getData();


   if(icon.name == "" || icon.code === undefined){
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Os campos de título e o ícones são obrigatórios!',
      });
   }else{

    if(typeof that !== 'undefined'){

      $(that).closest('div.single-icon div.card').find('.icons-info').html(

                  '<h5 class="card-title" style="margin-top: 1pc;">'+icon.name+'</h5>'+
                  '<div class="text-xs font-weight-bold text-uppercase mb-1"><i class="'+icon.code+' fa-2x"></i></div>'
      );


      $(that).closest('div.single-icon').find('input[type="hidden"]').each((index,icons_attributes) => {



          if(index === 0){
            $(icons_attributes).val(icon.name) ;
          }else if(index === 1){
            $(icons_attributes).val(icon.code);
          }else if(index === 2){
            $(icons_attributes).val(icon.description) ;
          }
     });

    }





        Swal.fire(
          'Good job!',
          'Item editado!',
          'success'
      );



      icon.name = $("#edit_title").val("");
      icon.description =  CKEDITOR.instances.edit_description.setData("");
      icon.code = undefined;

      $("#modal_update_icone").modal('toggle');
   }
}

});


  $(document).on('click', '.save-icon', function(e){

    e.preventDefault();

    if(typeof icon !== 'undefined'){

      icon.name = $("#icons_title").val();
      icon.description = CKEDITOR.instances.new_icon.getData();


       if(icon.name == "" || icon.code === undefined){
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Os campos de título e o ícones são obrigatórios!',
          });
       }else{

        $("#icons-container").append('<div class="col-md-2 single-icon" style="display: flex;justify-content: center;padding-bottom: 1pc;">'+
                  '<div class="card" style="width: 80%;text-align: center;">'+
                  '<div class="icons-info">'+
                      '<h5 class="card-title" style="margin-top: 1pc;">'+icon.name+'</h5>'+
                      '<div class="text-xs font-weight-bold text-uppercase mb-1"><i class="'+icon.code+' fa-2x"></i></div>'+
                    '</div>'+
                     '<div class="card-body">'+
                      '<div class="row" style="display: flex;flex-wrap: nowrap;">'+
                      '<div class="col-md-6">  <button class="btn btn-danger icon-remove"><i class="fas fa-trash-alt"></i></button> </div>'+
                      '<div class="col-md-6"> <button class="btn btn-info icon-edit"><i class="fas fa-pen-square"></i></button> </div>'+
                      '</div>'+
                      '</div>'+
                    '</div>'+
                    '<input type="hidden" name="icons['+icons+'][titulo]" value="'+icon.name+'">'+
                '<input type="hidden" name="icons['+icons+'][codigo_icone]" value="'+icon.code+'">'+
                "<input type='hidden' name='icons["+icons+"][descricao]' value='"+icon.description+"'>"+
              '</div>'

              );
            icons++;
            Swal.fire(
              'Good job!',
              'Item adicionado!',
              'success'
          );

          icon.name = $("#icons_title").val("");
          icon.description = CKEDITOR.instances.new_icon.setData("");
          icon.code = undefined;

          $("#modal_cadastro_icone").modal('toggle');

          if($(".icons-container").is(":visible") === false){
            $(".icons-container").show();
          }

       }
    }

  });

  $(function () {



    $('.add-icon').on('click', function(event){
      event.preventDefault();
       icon = {
        name : undefined,
        description : undefined,
        code : undefined
      };

      $("#modal_cadastro_icone").modal('show');

      if(typeof CKEDITOR.instances.new_icon === "undefined"){
        let ckeditor_icon = CKEDITOR.replace( 'new_icon' );
      }


    });

    $('.action-destroy').on('click', function () {
      $.iconpicker.batch('.icp.iconpicker-element', 'destroy');
    });

    $('#btn_remove_icon').on('click', function () {
      let className = $('#icone').attr('class');
      $('#icone').removeClass(className);
      $(this).hide();
      Swal.fire(
      'Ícone removido com sucesso!',
      'Clique em salvar, para confirmar suas alterações!',
      'success'
      )
    });

    // Live binding of buttons
    $(document).on('click', '.action-placement', function (e) {
      $('.action-placement').removeClass('active');
      $(this).addClass('active');
      $('.icp-opts').data('iconpicker').updatePlacement($(this).text());
      e.preventDefault();
      return false;
    });
    $('.action-create').on('click', function () {
      $('.icp-auto').iconpicker();

      $('.icp-dd').iconpicker({
        //title: 'Dropdown with picker',
        //component:'.btn > i'
      });
      $('.icp-opts').iconpicker({
        title: 'With custom options',
        icons: [
        {
          title: "fab fa-github",
          searchTerms: ['repository', 'code']
        },
        {
          title: "fas fa-heart",
          searchTerms: ['love']
        },
        {
          title: "fab fa-html5",
          searchTerms: ['web']
        },
        {
          title: "fab fa-css3",
          searchTerms: ['style']
        }
        ],
        selectedCustomClass: 'label label-success',
        mustAccept: true,
        placement: 'bottomRight',
        showFooter: true,
        // note that this is ignored cause we have an accept button:
        hideOnSelect: true,
        // fontAwesome5: true,
        templates: {
          footer: '<div class="popover-footer">' +
            '<div style="text-align:left; font-size:12px;">Placements: \n\
              <a href="#" class=" action-placement">inline</a>\n\
              <a href="#" class=" action-placement">topLeftCorner</a>\n\
              <a href="#" class=" action-placement">topLeft</a>\n\
              <a href="#" class=" action-placement">top</a>\n\
              <a href="#" class=" action-placement">topRight</a>\n\
              <a href="#" class=" action-placement">topRightCorner</a>\n\
              <a href="#" class=" action-placement">rightTop</a>\n\
              <a href="#" class=" action-placement">right</a>\n\
              <a href="#" class=" action-placement">rightBottom</a>\n\
              <a href="#" class=" action-placement">bottomRightCorner</a>\n\
              <a href="#" class=" active action-placement">bottomRight</a>\n\
              <a href="#" class=" action-placement">bottom</a>\n\
              <a href="#" class=" action-placement">bottomLeft</a>\n\
              <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
              <a href="#" class=" action-placement">leftBottom</a>\n\
              <a href="#" class=" action-placement">left</a>\n\
              <a href="#" class=" action-placement">leftTop</a>\n\
            </div><hr></div>'
          }
        });
      }).trigger('click');


      // Events sample:
      // This event is only triggered when the actual input value is changed
      // by user interaction

    });
    $('.icp').on('iconpickerSelected', function (e) {
        icon.code = e.iconpickerValue;

        // $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
        // e.iconpickerInstance.options.iconBaseClass + ' ' +
        // e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
      });
  </script>
  <!-- /.container-fluid -->
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on("click","#btn_cadastra_pagina",function() {
      let className = $('#icone').attr('class');
      $("#input_icone").val(className);

      let categorias = $('#categorias').val();

      if(categorias == "none"){
        Swal.fire(
        'Ops!',
        'Selecione uma categoria para cadastrar!',
        'error'
        )
      }else{
        $( "#form_cadastro_produto" ).submit();
      }

    });

    $(document).on("click","#btn_remove",function() {
      let id_pagina = $(this).val();

      $.ajax({
        url: "/produtos/remover_imagem",
        type: 'post',
        data:{
          _token: '{!! csrf_token() !!}',
          id_pagina:id_pagina,
        },
        success: function(result){
          location.reload();
          // $("#form_cadastro_produto").empty();
          // $("#form_cadastro_produto").html(result);

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
