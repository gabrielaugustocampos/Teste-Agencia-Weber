<div class="form-group">
  <!-- <label for="exampleFormControlSelect1">Localização</label> -->
  <select class="form-control" id="select_localizacao">
    <option selected value="none">Selecione uma Categoria</option>
    @foreach ($categorias as $item)
      <option value="{{$item->id}}">{{$item->nome}}</option>
    @endforeach
  </select>
</div>
