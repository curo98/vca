@extends("backend.layouts.backend")
@section("backend")


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
                                Lista de Usuarios
                                <a style="display: inline;" href="{{ route('usuarios.create') }}" class="btn btn-sm btn-outline-success btn-min-width mr-1 mb-1"> NUEVO USUARIO</a>
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
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissable" role="alert">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <span aria-hidden="true">
                                            ×
                                        </span>
                                    </button>
                                    <h3 class="alert-heading font-size-h4 font-w400">
                                        Exito!!
                                    </h3>
                                    <p class="mb-0">
                                        {{ Session::get('success') }}
                                    </p>
                                </div>
                                @endif

                                @if(Session::has('destroy'))
                                <div class="alert alert-danger alert-dismissable" role="alert">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <span aria-hidden="true">
                                            ×
                                        </span>
                                    </button>
                                    <h3 class="alert-heading font-size-h4 font-w400">
                                        XD!!
                                    </h3>
                                    <p class="mb-0">
                                        {{ Session::get('destroy') }}
                                    </p>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Nombres
                                                </th>
                                                <th>
                                                    E-mail
                                                </th>
                                                <th>
                                                    Roles
                                                </th>
                                                <th>
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $usuario)
                                            <tr>
                                                <td>
                                                    {{ $usuario->nombre }} {{ $usuario->apellidos }}
                                                </td>
                                                <td>
                                                    {{ $usuario->email }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $usuario->roles->pluck('display_name')->implode(' - ') }}
                                                    </span>
                                                </td>
                                               
                                                <td>
                                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline">
                                                        {!! csrf_field() !!}
                                                        {!! method_field('DELETE') !!}
                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                            <i class="fa fa-times">
                                                            </i>
                                                        </button>
                                                    </form>
                                                    <a class="btn btn-sm btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">
                                                        <i class="fa fa-link">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
