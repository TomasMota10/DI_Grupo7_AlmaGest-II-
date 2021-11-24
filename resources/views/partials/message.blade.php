<div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                                      </div>
                                      <div class="modal-body">
                                        {{$message}}
                                      </div>
                                      <div class="modal-footer">
                                        <a class="btn btn-danger" *ngIf="{{$titulo}} == 'Borrar'" href="/usuarios/{{$user->id}}/softdelete">Borrar</i></a>
                                        <a class="btn btn-danger" *ngIf="{{$titulo}} == 'Confirmar'" data-dismiss="modal">Confirmar</i></a>
                                        <a data-dismiss="modal" *ngIf="{{$titulo}} != 'Confirmar'" class="btn btn-primary">Cancelar</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>