<div class="container-fluid">
    <div class="col-lg-12 mb-4">

        <div class="row" style="display: flex;align-items: center;padding-bottom: 1pc;">
            <div class="col-md-10">
                <h1 class="h3 mb-4 text-gray-800">Produtos</h1>
            </div>
            
        </div>

        <div class="row">
    
            @foreach($produtos as $item)
        
            <div class="col-sm-12 col-md-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="no-gutters align-items-center">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12 mr-2" style="padding-bottom: 1pc;text-align:center;">
    
                            <div type="text" class="h4 mb-0 font-weight-bold text-gray-800">{{$item->nome}}</div><br>

                            <div type="text" class="h5 mb-0 font-weight-bold text-gray-800">R$ {{str_replace('.', ',', number_format($item->preco, 2))}}</div><br>

                            <div class="text-s font-weight-bold text-uppercase mb-1" style="color: green;">{{strip_tags($item->texto)}}</div>
                        </div>
                        </div>
                        <div class="row" style="display: flex;justify-content: center;flex-wrap: wrap;">
                        <div class="col-md-12 col-sm-12" style="padding-top:1pc;">
                            <img src="{{asset('imagens_produtos').'/'.$item->imagem}}" alt="your image" style="max-width: 225px;"/>
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
  