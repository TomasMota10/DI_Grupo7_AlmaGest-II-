<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="modal fade" id="modal-artInsert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Añadir un nuevo artículo</h4>
            </div>
            <div class="modal-body">
            <form action="/articulos" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf
              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre del Artículo</label>

                  <div class="col-sm-10">
                    <input type="text" id="name" placeholder="Nombre" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPriceMin" class="col-sm-2 control-label">Precio Mínimo</label>

                  <div class="col-sm-10">
                    <select id="price_min" class="form-control select2" name="price_min" style="width: 100%;">
                    @foreach($priceMin as $price)  
                      <option>{{$price}}</option>
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
                      <option>{{$price}}</option>
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
                      <option>{{$color}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

              <div class="form-group">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Peso</b>&nbsp;&nbsp;&nbsp;<input class="rb1" value="peso" name="rb1" type="radio" id="rbsize1" checked="true">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tamaño</b>&nbsp;&nbsp;&nbsp;<input class="rb1" value="tamaño" name="rb1" type="radio" id="rbsize1">
                  <label for="inputWeight" class="col-sm-2 control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <div class="col-sm-10" id="divPeso">
                    <select id="weight" class="form-control select2" name="weight" style="width: 100%;">
                    @foreach($peso as $p)  
                      <option>{{$p}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

            <div id="divTamaño" class="form-group" style="display:none;">
                <label for="inputSize" class="col-sm-2 control-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorNum" name="rb" type="radio" id="rbsize1" checked="true"> Valor numérico
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorSimple" name="rb" type="radio" id="rbsize2"> Valor simple
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorComp" name="rb" type="radio" id="rbsize3"> Valor compuesto

                <div id="valorNum" class="col-sm-10">
                    <select id="size1" class="form-control select2" name="size1" style="width: 100%;">
                    @foreach($valoresNum as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorSimple" class="col-sm-10" style="display:none;">
                    <select id="size2" class="form-control select2" name="size2" style="width: 100%;">
                    @foreach($valoresSimples as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorComp" class="col-sm-10" style="display:none;">
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
                      <option>{{$family['name']}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
            </div>
 
            <div class="form-group">
                  <label for="inputDescription" class="col-sm-2 control-label">Descripción</label>

                <div class="col-sm-10">
                  <textarea id="description" placeholder="Descripción del artículo." class="form-control" name="description" rows="4" cols="50"></textarea>
                </div>

            </div>

              <div class="modal-footer">
            <button type="submit" class="btn btn-rigth btn-primary">Añadir</button>
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
        $(".rb").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'valorNum'){
                $("#valorNum").css("display", "block");
                $("#valorSimple").css("display", "none");
                $("#valorComp").css("display","none");
            }else if(valor == 'valorSimple'){
                $("#valorSimple").css("display", "block");
                $("#valorNum").css("display", "none");
                $("#valorComp").css("display","none");
            }else if(valor == 'valorComp'){
                $("#valorSimple").css("display", "none");
                $("#valorNum").css("display", "none");
                $("#valorComp").css("display","block");
            }
            else if(valor == 'valorNum1'){
                $("#valorNum1").css("display", "block");
                $("#valorSimple1").css("display", "none");
                $("#valorComp1").css("display","none");
            }else if(valor == 'valorSimple1'){
                $("#valorSimple1").css("display", "block");
                $("#valorNum1").css("display", "none");
                $("#valorComp1").css("display","none");
            }else if(valor == 'valorComp1'){
                $("#valorSimple1").css("display", "none");
                $("#valorNum1").css("display", "none");
                $("#valorComp1").css("display","block");
            }
    });
});
$(document).ready(function(){
        $(".rb1").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'peso'){
                $("#divPeso").css("display", "block");
                $("#divTamaño").css("display", "none");
            }
            else if(valor == 'tamaño'){
                $("#divPeso").css("display", "none");
                $("#divTamaño").css("display", "block");
            }
    });
});
</script>
        <!-- /.modal -->