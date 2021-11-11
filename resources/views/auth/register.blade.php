@extends('layouts.lte2')

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')

<div class="centrar-form card-body">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registro</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @include('partials.errors')

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            @csrf
              <div class="box-body">

              <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" id="firstname" placeholder="Nombre" class="form-control" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                    
                  </div>
                </div>

              <div class="form-group">
                  <label for="inputApellidos" class="col-sm-2 control-label">Apellidos</label>

                  <div class="col-sm-10">
                    <input type="text" id="secondname" placeholder="Apellidos" class="form-control" name="secondname" value="{{ old('secondname') }}" required autocomplete="secondname" autofocus>
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
                    <input type="email" id="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>

                  <div class="col-sm-10">
                    <input type="password" placeholder="Contraseña" class="form-control" name="password" required autocomplete="new-password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-sm-2 control-label">Confirmación</label>

                  <div class="col-sm-10">
                  <input id="password-confirm" placeholder="Confirmación" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-block btn-primary">Registrarse</button>
                  <div class="checkbox">

                </div>
            </div>
</form>
                </div>
              </div>

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secondname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="secondname" type="text" class="form-control @error('secondname') is-invalid @enderror" name="secondname" value="{{ old('secondname') }}" required autocomplete="secondname" autofocus>

                                @error('secondname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Compañía') }}</label>

                            <div class="col-md-6">
                                <input id="company_id" type="number" class="form-control @error('company_id') is-invalid @enderror" name="company_id" required autocomplete="company_id" autofocus>

                                @error('company_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmación') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection