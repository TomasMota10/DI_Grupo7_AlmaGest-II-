<!-- Button trigger modal -->
                                <!-- Modal -->
<div class="modal fade" id="modalArtDelete-{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Artículo</h5>
      </div>
      <div class="modal-body">
        ¿Estás seguro de eliminar el articulo {{$article->name}}?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn"  href="/articulos/{{$article->id}}/softdelete">Borrar</i></a>
        <button type="button" class="btn btn-primary"  data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
