<div class="container-fluid">
  <div class="col-lg-12 mb-4">

    <div class="row" style="display: flex;align-items: center;padding-bottom: 1pc;">
      <div class="col-md-10">
          <h1 class="h3 mb-4 text-gray-800">Categorias</h1>
      </div> 
    </div>

    <div class="row">

      @foreach($categorias as $item)
     
        <div class="col-sm-12 col-md-3 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="no-gutters align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 mr-2" style="padding-bottom: 1pc;text-align:center;">

                        <div type="text" class="h5 mb-0 font-weight-bold text-gray-800">{{$item->nome}}</div><br>

                      {{-- <div class="h6 mb-0 font-weight-bold text-gray-800">{{$galeria->descricao}}</div> --}}
                      <div class="text-s font-weight-bold text-uppercase mb-1" style="color: green;">{{$item->descricao}}</div>
                    </div>
                  </div>
                  <div class="row" style="display: flex;justify-content: center;flex-wrap: wrap;">
                    <div class="col-md-12 col-sm-12" style="padding-top:1pc;">
                    <a href="/produtos/{{$item->id}}">
                      <button value="teste" type="button" class="btn btn-info btn_editar_galeria" style="width: 100%;">
                        <i class="fas fa-eye" style="padding-right: 1em;"></i> Entrar
                      </button>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      @endforeach

    </div>
  </div>
</div>
