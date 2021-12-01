<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="modal fade" id="modal-artEdit-{{$article->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                  
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Artículo</h4>
            </div>
            <div class="modal-body">
            <form action="/articulos/{{$article -> id}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf @method('put')

              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre del Artículo</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{ $article-> name }}" id="name" placeholder="Nombre" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPriceMin" class="col-sm-2 control-label">Precio Mínimo</label>

                  <div class="col-sm-10">
                    <select id="price_min" class="form-control select2" name="price_min" style="width: 100%;">
                    @foreach($priceMin as $price)  
                      <option {{ $article->price_min == $price ? 'selected' : ''}}>{{$price}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPriceMax" class="col-sm-2 control-label">Precio Máximo</label>

                  <div class="col-sm-10">
                    <select id="price_max" class="form-control select2" name="price_max" style="width: 100%;">
                    @foreach($priceMax as $price)  
                      <option {{ $article->price_max == $price ? 'selected' : ''}}>{{$price}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputColor" class="col-sm-2 control-label">Color</label>

                  <div class="col-sm-10">
                    <select id="color_name" class="form-control select2" name="color_name" style="width: 100%;">
                    @foreach($colores as $color)  
                      <option {{ $article->color_name == $color ? 'selected' : ''}}>{{$color}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

              <div class="form-group" style={{!in_array($article->weight, $peso) ? 'display:none' : ''}}>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Peso</b>&nbsp;&nbsp;&nbsp;<input class="rb2" value="peso{{$article->id}}" name="rb2" type="radio" id="rbsize1" {{in_array($article->weight, $peso) ? 'checked' : ''}}>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tamaño</b>&nbsp;&nbsp;&nbsp;<input class="rb2" value="tamaño{{$article->id}}" name="rb2" type="radio" id="rbsize1" {{!in_array($article->weight, $peso) ? 'checked' : ''}}>
                  <label for="inputWeight" class="col-sm-2 control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <div class="col-sm-10" id="divPeso{{$article->id}}">
                    <select id="weight" class="form-control select2" name="weight" style="width: 100%;">
                    @foreach($peso as $p)  
                      <option {{$article->weight == $p ? 'selected' : ''}}>{{$p}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

            <div class="form-group" id="divTamaño{{$article->id}}" style={{in_array($article->weight, $peso) ? 'display:none' : ''}}>
                <label for="inputSize" class="col-sm-2 control-label">Tamaño</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb1" value="valorNum{{$article->id}}" name="rb1" type="radio" id="rbsize11" {{in_array($article->size, $valoresNum) ? 'checked' : ''}}> Valor numérico
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb1" value="valorSimple{{$article->id}}" name="rb1" type="radio" id="rbsize22" {{in_array($article->size, $valoresSimples) ? 'checked' : ''}}> Valor simple
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb1" value="valorComp{{$article->id}}" name="rb1" type="radio" id="rbsize33"> Valor compuesto

                <div id="valorNum{{$article->id}}" class="col-sm-10">
                    <select id="size1" class="form-control select2" name="size1" style="width: 100%;" onchange="myFunction(this.value)">
                    @foreach($valoresNum as $val)  
                    <option {{$article->size == '$val' ? 'selected' : ''}}>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorSimple{{$article->id}}" class="col-sm-10" style="display:none;">
                    <select id="size2" class="form-control select2" name="size2" style="width: 100%;">
                    @foreach($valoresSimples as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorComp{{$article->id}}" class="col-sm-10" style="display:none;">
                  <label for="inputSize" class="col-sm-2 control-label">Ancho</label>
                    <select id="size3" class="form-control select2" name="size3" style="width: 100%;">
                    @foreach($valoresCompAnch as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                    <label for="inputSize" class="col-sm-2 control-label">Alto</label>
                    <select id="size4" class="form-control select2" name="size4" style="width: 100%;">
                    @foreach($valoresCompAlt as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                    </div>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>

            </div>

            <div class="form-group">
                  <label for="inputWeight" class="col-sm-2 control-label">Familia</label>

                  <div class="col-sm-10">
                    <select id="family" class="form-control select2" name="family" style="width: 100%;">
                    @foreach($families as $family)  
                      <option {{ $article->family_id == $family['id'] ? 'selected' : ''}}>{{$family['name']}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
            </div>

            <div class="form-group">
                  <label for="inputDescription" class="col-sm-2 control-label">Descripción</label>

                <div class="col-sm-10">
                  <textarea id="description" placeholder="Descripción del Artículo." value="{{ $article -> description }}" class="form-control" name="description" rows="4" cols="50">{{ $article -> description }}</textarea>
                </div>

            </div>

              <div class="modal-footer">
            <button type="submit" class="btn btn-rigth btn-primary">Actualizar</button>
            </div>

            </form>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->
</div>

<script>
  $(document).ready(function(){
        $(".rb1").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'valorNum{{$article->id}}'){
                $("#valorNum{{$article->id}}").css("display", "block");
                $("#valorSimple{{$article->id}}").css("display", "none");
                $("#valorComp{{$article->id}}").css("display","none");
            }else if(valor == 'valorSimple{{$article->id}}'){
                $("#valorSimple{{$article->id}}").css("display", "block");
                $("#valorNum{{$article->id}}").css("display", "none");
                $("#valorComp{{$article->id}}").css("display","none");
            }else if(valor == 'valorComp{{$article->id}}'){
                $("#valorSimple{{$article->id}}").css("display", "none");
                $("#valorNum{{$article->id}}").css("display", "none");
                $("#valorComp{{$article->id}}").css("display","block");
            }
    });
});
$(document).ready(function(){
        $(".rb2").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'peso{{$article->id}}'){
                $("#divPeso{{$article->id}}").css("display", "block");
                $("#divTamaño{{$article->id}}").css("display", "none");
            }
            else if(valor == 'tamaño{{$article->id}}'){
                $("#divPeso{{$article->id}}").css("display", "none");
                $("#divTamaño{{$article->id}}").css("display", "block");
            }
    });
});
</script>