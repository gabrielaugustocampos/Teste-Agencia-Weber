<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Editar Meta Tags</h1>

    <div class="col-md-12">
        <div class="form-group">
            <select class="form-control" id="select_meta">
                <option value="0" disabled selected>Selecione um tipo de meta tag</option>
                <option value="1">Imagens</option>
                <option value="2">Palavras-Chaves</option>
                <option value="3">Nome do site</option>
                <option value="4">Autor</option>
                <option value="5">Titulo</option>
                <option value="6">Localização</option>
                <option value="7">URL</option>
                <option value="8">Descrição</option>
            </select>
        </div>
    </div>
    <div class="result_ajax">
        @if ($errors->any())
        <div class="row alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Como usar as Meta Tags</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Meta Tag Imagem - </strong>Suba uma imagem de no máximo 190 KB de tamanho. Imagem de
                            compartilhamento</p>
                        <p><strong>Meta Tag Palavras-Chaves - </strong>Digite as Palavras-Chaves divididas por vírgulas.
                            Utilizada para indexação do seu site.</p>
                        <p><strong>Meta Tag Nome do site - </strong>Tag de compartilhamento</p>
                        <p><strong>Meta Tag Autor - </strong>Tag de compartilhamento</p>
                        <p><strong>Meta Tag Titulo - </strong>Tag de compartilhamento</p>
                        <p><strong>Meta Tag Localização - </strong>Tag de localidade, campos para colocar:</p>
                        <ul>
                            <li>en_GB</li>
                            <li>de_AT</li>
                            <li>de_CH</li>
                            <li>de_DE</li>
                            <li>en_AU</li>
                            <li>en_CA</li>
                            <li>en_GB</li>
                            <li>en_IE</li>
                            <li>en_IN</li>
                            <li>en_SG</li>
                            <li>en_US</li>
                            <li>en_ZA</li>
                            <li>es_ES</li>
                            <li>es_MX</li>
                            <li>fi_FI</li>
                            <li>fr_CA</li>
                            <li>fr_CH</li>
                            <li>fr_FR</li>
                            <li>id_ID</li>
                            <li>it_IT</li>
                            <li>nb_NO</li>
                            <li>nl_NL</li>
                            <li>pl_PL</li>
                            <li>pt_BR - <span style="color:red;">Padrão<span></li>
                            <li>pt_PT</li>
                            <li>ru_RU</li>
                            <li>sv_SE</li>
                            <li>th_TH</li>
                            <li>tr_TR</li>
                            <li>vi_VN</li>
                            <li>zh_CN</li>
                        </ul>
                        <p><strong>Meta Tag URL - </strong>Digite a URL do seu site, para compartilhamento.</p>
                        <p><strong>Meta Tag Descrição - </strong>Digite o texto que irá aparecer na sua descrição de compartilhamento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("change", "#select_meta",function() {
        let tipo_meta = $(this).val();

        $.ajax({
        url: "{{route('metas.retornar_formulario_meta_editar')}}",
        type: 'post',
        data:{
            _token: '{!! csrf_token() !!}',
            tipo_meta:tipo_meta,
        },
        success: function(result){

            if(result == 1){
                Swal.fire(
                    'Meta tag não encontrada!',
                    'Esta meta tag não está cadastrada',
                    'error'
                )
                $(".result_ajax").empty();
            }else{
                $(".result_ajax").empty();
                $(".result_ajax").html(result);
            }
        }
    });
  });
</script>