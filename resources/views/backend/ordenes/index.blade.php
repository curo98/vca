@extends('backend.layouts.backend')
@section('backend')

<!-- Horizontal navigation-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Lista de ordenes
                                <a style="display: inline;" href="{{ route('pagina.orden_de_servicio') }}" class="btn btn-sm btn-outline-success btn-min-width mr-1 mb-1"> NUEVA ORDEN</a>
                            </h4>
                            <a class="heading-elements-toggle">
                                <i class="fa fa-ellipsis-v font-medium-3">
                                </i>
                            </a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a data-action="collapse">
                                            <i class="ft-minus">
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="reload">
                                            <i class="ft-rotate-cw">
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="expand">
                                            <i class="ft-maximize">
                                            </i>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-action="close">
                                            <i class="ft-x">
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                
                                <div class="row match-height">
                                  @foreach($ordenes as $orden)
                                  <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="text-center card box-shadow-0 border-info bg-transparent">
                                      <div class="card-content">
                                        <div class="card-body">
                                          <h4 class="card-title">Servicio de: {{ $orden->servicio->titulo }}</h4>
                                          <h6 class="card-subtitle text-muted"><strong>Solicitado por:</strong> {{ $orden->user->nombre }} {{ $orden->user->apellidos }}</h6>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('images/servicios/'.$orden->servicio->imagen) }}" alt="Card image cap">
                                        
                                        <div class="card-body">
                                          <h2>Detalles de la orden</h2>
                                          <p class="card-text">{{ $orden->contenido }}
                                          </p>

                                          @if (Auth::user()->hasRoles(['trabajador']))
                                              @if($orden->estado_id == 1)
                                              <form action="{{ route('iniciar', $orden->id) }}" method="POST">
                                                  {!! csrf_field() !!}
                                                  {!! method_field('PUT') !!}
                                                  <button class="btn btn-outline-success" type="submit">
                                                       INICIAR
                                                  </button>
                                              </form>
                                              @else
                                                  @if($orden->estado_id == 2)
                                                  <form action="{{ route('finalizar', $orden->id) }}" method="POST">
                                                      {!! csrf_field() !!}
                                                      {!! method_field('PUT') !!}
                                                      <button class="btn btn-outline-danger" type="submit">
                                                       FiNALIZAR
                                                  </button>
                                                  </form>
                                                  @endif
                                              @endif
                                          @endif

                                          @if ($orden->trabajador_id)
                                          <hr>
                                          Trabajador: <a href="#" class="card-link">{{ $orden->trabajador->user->nombre }} {{ $orden->trabajador->user->apellidos }}
                                          </a>
                                          @endif

                                          <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('editar.orden',$orden->id) }}"><button type="button" class="btn btn-info"><i class="fa fa-info"></i> Detalles</button></a>

                                            <form action="{{ route('eliminar.orden', $orden->id) }}" method="POST">
                                              {!! csrf_field() !!}
                                              {!! method_field('DELETE') !!}
                                              <button type="submit" class="btn btn-warning"><i class="fa fa-trash"></i> Eliminar</button>
                                            </form>

                                          </div>                
                                        </div>
                                      </div>
                                      <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                        <span class="float-left">{{ $orden->created_at->diffForHumans() }}</span>

                                        @if ($orden->estado_id == 1)
                                        <span class="tags float-right">
                                          Estado: <span class="badge badge-pill badge-danger">{{ $orden->estado->nombre }}</span>
                                        </span>
                                        @else
                                          @if ($orden->estado_id == 2)
                                          <span class="tags float-right">
                                          Estado: <span class="badge badge-pill badge-warning">{{ $orden->estado->nombre }}</span>
                                          </span>
                                          @else
                                              @if ($orden->estado_id == 3)
                                              <span class="tags float-right">
                                              Estado: <span class="badge badge-pill badge-success">{{ $orden->estado->nombre }}</span>
                                              </span>
                                              @endif
                                          @endif
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection
