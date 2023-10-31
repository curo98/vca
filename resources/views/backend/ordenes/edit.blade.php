@extends('backend.layouts.backend')
@section('backend')


<!-- Horizontal navigation-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                        @foreach ($errors->all() as $error)
                        <li>
                            <i class="fa fa-info-circle">
                            </i>
                            {{ $error }}
                        </li>
                        @endforeach
                    </div>
                    @endif

                    <div class="col-md-12">

                        @if(Session::has('info'))
                        <!-- Info Alert -->
                        <div class="alert alert-info alert-dismissable" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                            <h3 class="alert-heading font-size-h4 font-w400">
                                orden actualizada
                            </h3>
                            <p class="mb-0">
                                {{Session::get('info')}}
                            </p>
                        </div>
                        <!-- END Info Alert -->
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">
                                    Editar Usuario
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
                                    
                                    <form class="form" action="{{ route('actualizar.orden', $orden->id) }}" method="post">
                                        {!! method_field('PUT') !!}

                                        @include('backend.ordenes.includes.form')

                                        <div class="form-actions">
                                            <button class="btn btn-warning mr-1" type="button">
                                                <i class="ft-x">
                                                </i>
                                                Cancel
                                            </button>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-check-square-o">
                                                </i>
                                                Actualizar datos
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection
