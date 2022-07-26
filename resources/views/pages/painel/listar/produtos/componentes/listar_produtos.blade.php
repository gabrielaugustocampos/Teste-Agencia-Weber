<!-- Begin Page Content -->
<div id="topo_lista_paginas" class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produtos</h1>
    <div class="tabela">
        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="result_localizacao">
                    <div class="form-group">
                        <!-- <label for="exampleFormControlSelect1">Localização</label> -->
                        <select class="form-control" id="select_localizacao">
                            <option selected value="none">Selecione uma Categoria</option>
                            @foreach ($categorias as $item)
                            <option value="{{$item->id}}">{{$item->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="result_localizacao">
                    <div class="form-group">
                        <!-- <label for="exampleFormControlSelect1">Localização</label> -->
                        <select class="form-control" id="select_filtro">
                            <option selected value="none">Filtro Busca</option>
                            <option value="0">Ativos</option>
                            <option value="1">Excluidos</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12" style="display: flex;align-items: center;">
                <div class="form-group" style="width: 100%;">
                    <button id="btn_buscar_paginas" type="button" class="btn btn-secondary" style="width: 100%;">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" style="display: flex;align-items: center;">
                <div class="form-group" style="width: 100%;">
                    <a href="{{url('/cadastro_produtos')}}" class="btn btn-success" style="width: 100%;">
                        <i class="fas fa-folder-plus"></i> Adicionar Produto
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="loading" style="display:flex;justify-content:center;">

                </div>
            </div>


            <!-- DataTales Example -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #335acb;color: white;">

                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    @if (!empty($produtos[0]))
                                    @foreach ($produtos as $item)
                                    <tr>
                                        <th>{{$item->nome}}</th>
                                        <th>{{ str_limit($item->texto, $limit = 30, $end = '...') }}</th>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <input type="hidden" value="{{$item->id_produto}}">
                                                        @if ($item->excluido == 0)
                                                        <div href="#" style="color:green;display: flex;"><i
                                                                class="fas fa-check-circle"></i>
                                                            <p style="margin-bottom: auto;padding-left: 6px;">Ativo<p>
                                                        </div>
                                                        @else
                                                        <div href="#" style="color:red;display: flex;"><i
                                                                class="fas fa-times-circle"></i>
                                                            <p style="margin-bottom: auto;padding-left: 6px;">Excluido
                                                                <p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="row">
                                                @if ($item->excluido == 0)
                                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                                    <button type="button" class="btn btn-danger status"
                                                        value="{{$item->id_produto}}"><i
                                                            class="fas fa-times-circle"></i></button>
                                                </div>
                                                @else
                                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                                    <button type="button" class="btn btn-info status"
                                                        value="{{$item->id_produto}}"><i
                                                            class="fas fa-trash-restore-alt"></i></button>
                                                </div>
                                                @endif
                                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                                    <a href="{{url('/produtos/editar', [$item->id_produto])}}"
                                                        class="btn btn-primary edit"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="odd">
                                        <td valign="top" colspan="6" class="dataTables_empty text-center">Nenhum
                                            resultado encontrado</td>
                                    </tr>
                                    @endif
                                </tbody>
                                <tfoot style="background-color: #335acb;color: white;">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
    function loading_show() {
        $('.loading').html("<img src='{{asset('img/loader.gif')}}'/>").fadeIn('fast');
    }

    function loading_hide() {
        $('.loading').fadeOut('fast');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".status", function () {

        let id_produto = $(this).val();
        let aux_evento_botao = 0;
        $.ajax({
            url: "/produtos/alterar_status/localizacao",
            type: 'post',
            data: {
                _token: '{!! csrf_token() !!}',
                id_produto: id_produto,
                aux_evento_botao: aux_evento_botao,
            },

            // beforeSend: function(){
            //   loading_show();
            // },

            success: function (result) {
                // loading_hide();
                $('.tabela').empty();
                $('.tabela').html(result);
                // alert("Eu sou um alert!");
                
            },
            error: function () {
                // alert("Eu sou um alert2!");               
            }
        });
    });


    $(document).on("click", "#btn_buscar_paginas", function () {
        let id_localizacao = $("#select_localizacao").val();
        let valor_filtro = $('#select_filtro').val();
        $.ajax({
            url: "/paginas/listar/produtos/id",
            type: 'post',
            data: {
                _token: '{!! csrf_token() !!}',
                valor_filtro: valor_filtro,
                id_localizacao: id_localizacao,
            },

            // beforeSend: function(){
            //   loading_show();
            // },

            success: function (result) {
                // loading_hide();

                if (result == 1) {
                    Swal.fire(
                        'Ops!',
                        'Selecione uma localização para consultar!',
                        'error'
                    )
                } else {
                    $('.tabela').empty();
                    $('.tabela').html(result);
                }
                // $('#modal_cadastro_localizacao').modal('hide');
            }
        });
    });

</script>
