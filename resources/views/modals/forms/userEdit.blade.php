<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <div class="modal-body">
            <form action="/usuarios/{{$user->id}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
            @csrf @method('put')

              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" id="firstname" value="{{ $user-> firstname }}" placeholder="Nombre" class="form-control" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>

                  <div class="col-sm-10">
                    <input type="text" id="secondname" value="{{ $user-> secondname }}" placeholder="Apellidos" class="form-control" name="secondname" value="{{ old('secondname') }}" required autocomplete="secondname" autofocus>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputCompany" class="col-sm-2 control-label">Compañía</label>

                  <div class="col-sm-10">
                    <select id="company_id" class="form-control select2" name="company_id" style="width: 100%;">
                    @foreach($companies as $company)
                        <option>{{$company->name}}</option>
                    @endforeach
                    </select>
                    <!--<input type="number" placeholder="Compañía" class="form-control" name="company_id" required autocomplete="company_id">-->
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" id="email" value="{{ $user-> email }}" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>

                <div class="col-sm-10">
                    <input type="password" placeholder="Contraseña" class="form-control" name="password">
                </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-sm-2 control-label">Confirmación</label>

                <div class="col-sm-10">
                  <input id="password-confirm" placeholder="Confirmación" type="password" class="form-control" name="password_confirmation">
                  </div>
              </div>

              <div class="modal-footer">
            <button type="button" class="btn btn-block pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-block btn-primary">Actualizar</button>
            </div>

            </form>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->
</div>
        <!-- /.modal -->