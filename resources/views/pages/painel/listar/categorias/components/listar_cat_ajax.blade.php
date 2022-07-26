<div class="card-body tabela">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="background-color: #335acb;color: white;">

                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>
                @if (!empty($categorias[0]))
                @foreach ($categorias as $categoria)
                <tr>
                    <th>{{$categoria->nome}}</th>
                    <th>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <input type="hidden" value="{{$categoria->id}}">
                                    @if ($categoria->excluido == 0)
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
                            @if ($categoria->excluido == 0)
                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                    <button type="button" class="btn btn-danger status" id="deletar" title="Clique aqui para deletar a categoria"
                                        value="{{$categoria->id}}"><i
                                            class="fas fa-times-circle"></i></button>
                                </div>
                            @else
                                <div class="col-md-6" style="display: flex;justify-content: center;">
                                    <button type="button" class="btn btn-info status" id="deletar" title="Clique aqui para restaurar a categoria"
                                        value="{{$categoria->id}}"><i
                                            class="fas fa-trash-restore-alt"></i></button>
                                </div>
                            @endif
                            <div class="col-md-2" style="display: flex;justify-content: center;">
                                <a href="{{route('categorias.editar', ['id' => $categoria->id])}}" title="Clique para editar o nome da categoria"
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
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

