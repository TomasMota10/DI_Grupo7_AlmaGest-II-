@extends('layouts.lte')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de artículos</h3>
              <a data-toggle="modal" data-target="#modal-artInsert" class="btn btn-success btn-right">Añadir</a>
              @include('modals.forms.articleInsert')
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio min.</th>
                  <th>Precio max.</th>
                  <th>Color</th>
                  <th>Peso</th>
                  <th>Tamaño</th>
                </tr>
                </thead>
                <tbody>

                @foreach($articles as $article)
                <tr>
                    <td>{{ $article-> name }}</td>
                    <td>{{ $article-> description }}</td>
                    <td>{{ $article-> price_min }}</td>
                    <td>{{ $article-> price_max }}</td>
                    <td>{{ $article-> color_name }}</td>
                    <td>{{ $article-> weight }}</td>
                    <td>{{ $article-> size }}</td>

                    <td>
                    <a data-toggle="modal" data-target="#modal-artEdit-{{$article->id}}" class="btn btn-warning" title="Editar este artículo">Editar
                      </a>
                    @include('modals.forms.articleEdit')
                      <a data-toggle="modal" data-target="#modalArtDelete-{{$article->id}}" class="btn btn-danger" title="Eliminar este artículo">Eliminar
                    @include('modals.articleDelete')
                      </a>
                    </td>
                </tr>
                @endforeach

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

