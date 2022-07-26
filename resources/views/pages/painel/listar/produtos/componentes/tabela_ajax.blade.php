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
              @foreach ($produtos as $produto)
                <tr>
                  <th>{{$produto->nome}}</th>
                  <th>{{ str_limit($produto->texto, $limit = 50, $end = '...') }}</th>
                  <th>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="checkbox">
                          <input type="hidden" value="{{$produto->id_produto}}">
                          @if ($produto->excluido == 0)
                            <div href="#" style="color:green;display: flex;"><i class="fas fa-check-circle"></i><p style="margin-bottom: auto;padding-left: 6px;">Ativo<p></div>
                            @else
                              <div href="#" style="color:red;display: flex;"><i class="fas fa-times-circle"></i><p style="margin-bottom: auto;padding-left: 6px;">Excluido<p></div>
                              @endif
                            </div>
                          </div>
                        </div>
                      </th>
                      <th>
                        <div class="row">
                          @if ($produto->excluido == 0)
                            <div class="col-md-6" style="display: flex;justify-content: center;">
                              <button type="button" class="btn btn-danger status" value="{{$produto->id_produto}}"><i class="fas fa-times-circle"></i></button>
                            </div>
                          @else
                            <div class="col-md-6" style="display: flex;justify-content: center;">
                              <button type="button" class="btn btn-info status"  value="{{$produto->id_produto}}"><i class="fas fa-trash-restore-alt"></i></button>
                            </div>
                          @endif
                          <div class="col-md-6" style="display: flex;justify-content: center;">
                            <a href="{{url('/produtos/editar', [$produto->id_produto])}}" class="btn btn-primary edit"><i class="fas fa-pencil-alt"></i></a>
                          </div>
                        </div>
                      </th>
                    </tr>
                  @endforeach
            @else
              <tr class="odd">
                <th>Nenhum produto encontrada</th>
                <th>*</th>
                <th>*</th>
                <th>*</th>
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
{{-- <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script> --}}

<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
