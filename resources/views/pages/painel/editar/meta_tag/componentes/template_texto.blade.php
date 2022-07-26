<div class="container-fluid">
    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800">Template Texto</h2>
    <form id="form_cadastro_pagina" action="{{route('metas.update', ["id" => $meta_query->id])}}" method="POST" enctype="multipart/form-data">
        @csrf  
        <input name="_method" type="hidden" value="PUT">        
        <input name="tipo_meta" type="hidden" value="{{$tipo_meta}}">
        <div class="row" style="display: flex;align-items: flex-end;">

            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Conteúdo</label>
                <input type="text" class="form-control form-control-user" value="{{!empty($meta_query->content) ? $meta_query->content: ''}}" name="conteudo"
                        placeholder="Conteudo da meta tag">
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="form-group" style="width: 100%;">
                    <button type="submit" class="btn btn-info" style="width: 100%;">
                        <i class="fas fa-folder-plus"></i> Salvar
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>