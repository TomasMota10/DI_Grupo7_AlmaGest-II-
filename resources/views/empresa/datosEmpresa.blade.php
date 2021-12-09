@extends('layouts.lte')
@section('content')

<div class="row centrar">
  <div class="col-md-7">
  <div class="card-body">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos Empresa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- class=col-xs-6 col-sm-6 col-md-6 -->
            @include('partials.errors')

            <form class="form-horizontal" method="post" action="/company/{{$company -> id}}">
            @csrf @method('put')
              <div class="box-body">

              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$company-> name}}" id="company_name" placeholder="Nombre" class="form-control" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>
                    
                  </div>
                </div>

              <div class="form-group">
                  <label for="inputDireccion" class="col-sm-2 control-label">Dirección</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$company-> address}}" id="company_address" placeholder="Dirección" class="form-control" name="company_address" value="{{ old('company_address') }}" required autocomplete="company_address" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPoblacion" class="col-sm-2 control-label">Ciudad</label>

                  <div class="col-sm-10">
                    <input type="text" id="company_city" value="{{$company-> city}}" placeholder="Ciudad" class="form-control" name="company_city" value="{{ old('company_city') }}" required autocomplete="company_city" autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputCif" class="col-sm-2 control-label">CIF</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$company-> cif}}" id="company_cif" placeholder="CIF" class="form-control" name="company_cif" value="{{ old('company_cif') }}" required autocomplete="company_cif">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputCorreo" class="col-sm-2 control-label">Correo electrónico</label>

                  <div class="col-sm-10">
                    <input type="email" value="{{$company-> email}}" id="company_email" placeholder="Correo electrónico" class="form-control" name="company_email" required autocomplete="company_email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputTelefono" class="col-sm-2 control-label">Teléfono</label>

                  <div class="col-sm-10">
                  <input id="company_phone" value="{{$company-> phone}}" placeholder="Teléfono" class="form-control" name="company_phone" required autocomplete="company_phone">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputTelefono" class="col-sm-2 control-label">Gerente</label>

                  <div class="col-sm-10">
                  <input id="gerente" readonly placeholder="Gerente" value="{{auth()->user()->firstname}} {{auth()->user()->secondname}}" class="form-control" name="gerente" required autocomplete="company_phone">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPlazos" class="col-sm-2 control-label">Plazo de entrega</label>

                  <div class="col-sm-10">
                    <select id="delivery_terms" class="form-control select2" name="delivery_terms" style="width: 100%;">
                    @foreach($delivery_terms as $dt)  
                    <option {{ $company->payment_term_id == $dt->id ? 'selected' : ''}}>{{$dt->description}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPortes" class="col-sm-2 control-label">Portes</label>

                  <div class="col-sm-10">
                    <select id="transports_price" class="form-control select2" name="transports_price" style="width: 100%;">
                    @foreach($transports as $t)
                    <option {{ $company->transport_id == $t->id ? 'selected' : ''}}>{{$t->price}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputBanco" class="col-sm-2 control-label">Condiciones de pago</label>

                  <div class="col-sm-10">
                    <select id="bank_entity" class="form-control select2" name="bank_entity" style="width: 100%;">
                    @foreach($bank_entities as $be)
                    <option {{$company->bank_entity_id == $be->id ? 'selected' : ''}}>{{$be->name}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPago" class="col-sm-2 control-label">Entidad bancaria</label>

                  <div class="col-sm-10">
                    <select id="payment_terms" class="form-control select2" name="payment_terms" style="width: 100%;">
                    @foreach($payment_terms as $pt)
                    <option {{$company->payment_term_id == $pt->id ? 'selected' : ''}}>{{$pt->description}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputDescuentos" class="col-sm-2 control-label">Descuentos</label>

                  <div class="col-sm-10">
                    <select id="discount" class="form-control select2" name="discount" style="width: 100%;">
                    @foreach($discounts as $d)
                    <option {{ $company->discount_id == $d->id ? 'selected' : '' }}>{{$d->discount}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-block btn-primary">Actualizar</button>
                  <!-- <a href="{{ url('/company/ficha/'.$company->id) }}" class="btn btn-block btn-primary"><i class="fas fa-file-pdf"></i>Ver Ficha</a> -->

                </div>
            </div>
            </form>
                </div>
              </div>
  </div>
  <div class="row centrar">
  <div class="col-md-12">
  <div class="card-body">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recursos</h3>
              <div class="col-sm-offset-2 col-sm-10">
              <a href="{{ url('/company/ficha/'.$company->id) }}" class="btn btn-block btn-primary"><i class="fas fa-file-pdf"></i>Ver Ficha</a>
              </div>
            </div>
          </div>
        </div>
</div>
</div>
</div>

@endsection
