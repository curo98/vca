@extends('backend.layouts.backend')
@section('backend')



<main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    
                    <div class="col-md-12">
                            @if(Session::has('info'))
                                    <!-- Info Alert -->
                                    <div class="alert alert-info alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h4 font-w400">orden Creada</h3>
                                        <p class="mb-0">{{Session::get('info')}}</p>
                                    </div>
                                    <!-- END Info Alert -->
                                
                            @endif
                        </div> 
                    <div class="block">
                         
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Crear orden</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <form action="{{ route('orden_de_servicio') }}" method="post" >
                                
                                @include('backend.ordenes.includes.form')
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="fa fa-check mr-5"></i> Guardar orden
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Mega Form -->

                        </div>
                    </div>
                </div>
            </main>
            <!-- END Main Container -->


@endsection
