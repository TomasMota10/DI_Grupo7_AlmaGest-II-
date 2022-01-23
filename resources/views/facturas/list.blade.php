@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Facturas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nº Albarán</th>
                  <th>Nº Factura</th>
                  <th>Fecha de emisión</th>
                </tr>
                </thead>
                <tbody>

                @forelse($facturas as $factura)
                <tr>
                    <td>{{ $factura-> d_num }}</td>
                    <td>{{ $factura-> i_num }}</td>
                    <td>{{ $factura-> i_issue_date }}</td>
                </tr>
                @empty
                <h3>No se encuentra ningún factura para mostrarte.</h3>
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