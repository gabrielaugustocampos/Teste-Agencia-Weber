<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Cadastro de Categoria</h1>
    
    <div class="row">
        <form class="w-100" style="display: flex;flex-wrap: wrap;justify-content: center;align-items:center;" action="{{route('categorias.salvar_edit', ['id' => $categoria->id])}}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group w-100">
                    <label for="categorias_nome">Nome</label>
                    <input class="form-control form-control-user w-100" type="text" placeholder="Nome da categoria" name="nome" id="categorias_nome" value="{{$categoria->nome}}">
                  </div>
            </div>

            <div class="col-md-2 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
        
</div>

@if (Session::has('success')))
    <script>
        Swal.fire(
            'Salvo',
            '{{Session::get('success')}}',
            'success'
        )
    </script>
@endif