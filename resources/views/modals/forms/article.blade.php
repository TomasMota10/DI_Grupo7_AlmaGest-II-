<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="modal fade" id="modal-artInsert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Insertar Artículo</h4>
            </div>
            <div class="modal-body">
            <form action="/articulos" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf
              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>

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
                  <label for="inputWeight" class="col-sm-2 control-label">Peso</label>

                  <div class="col-sm-10">
                    <select id="weight" class="form-control select2" name="weight" style="width: 100%;">
                    @foreach($peso as $p)  
                      <option>{{$p}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

            <div class="form-group">
                <label for="inputSize" class="col-sm-2 control-label">Tamaño</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorNum" name="rb" type="radio" id="rbsize1" checked="true"> Valor numérico
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorSimple" name="rb" type="radio" id="rbsize2"> Valor simple
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="rb" value="valorComp" name="rb" type="radio" id="rbsize3"> Valor compuesto

                <div id="valorNum" class="col-sm-10">
                    <select id="size1" class="form-control select2" name="size" style="width: 100%;">
                    @foreach($valoresNum as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorSimple" class="col-sm-10" style="display:none;">
                    <select id="size2" class="form-control select2" name="size" style="width: 100%;">
                    @foreach($valoresSimples as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div id="valorComp" class="col-sm-10" style="display:none;">
                  <label for="inputSize" class="col-sm-2 control-label">Ancho</label>
                    <select id="size3" class="form-control select2" name="size" style="width: 100%;">
                    @foreach($valoresCompAnch as $val)  
                    <option>{{$val}}</option>
                    @endforeach
                    </select>
                    <label for="inputSize" class="col-sm-2 control-label">Alto</label>
                    <select id="size4" class="form-control select2" name="size" style="width: 100%;">
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
                  <textarea id="description" class="form-control" name="description" rows="4" cols="50"></textarea>
                </div>

            </div>

              <div class="modal-footer">
            <button type="button" class="btn btn-block pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-block btn-primary">Confirmar</button>
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
    });
});
</script>
        <!-- /.modal -->