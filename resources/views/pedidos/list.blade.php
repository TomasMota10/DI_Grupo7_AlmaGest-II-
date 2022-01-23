@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Pedidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nº Pedido</th>
                  <th>Fecha</th>
                  <th>Empresa de origen</th>
                </tr>
                </thead>
                <tbody>

                @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido-> o_num }}</td>
                    <td>{{ $pedido-> o_issue_date }}</td>
                    <td>{{ $pedido-> c_name }}</td>
                </tr>
                @empty
                <h3>No se encuentra ningún pedido para mostrarte.</h3>
                @endforelse

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
