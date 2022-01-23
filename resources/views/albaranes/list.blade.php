@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Albaranes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nº Pedido</th>
                  <th>Nº Albarán</th>
                  <th>Fecha de emisión</th>
                </tr>
                </thead>
                <tbody>

                @forelse($albaranes as $albaran)
                <tr>
                    <td>{{ $albaran-> o_num }}</td>
                    <td>{{ $albaran-> d_num }}</td>
                    <td>{{ $albaran-> d_issue_date }}</td>
                </tr>
                @empty
                <h3>No se encuentra ningún albaran para mostrarte.</h3>
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
