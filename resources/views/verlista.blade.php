@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    Lista de clientes
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Ver Lista
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
            <!-- end row -->
    </div>
    <div class="tables-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Clientes atrasados</h6>
                  <p class="text-sm mb-20">
                    La tabla muestra la información de los clientes con pagos pendientes
                  </p>
                    <div class="table-wrapper table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th><h6>#</h6></th>
                                <th><h6>Nombre</h6></th>
                                <th><h6>Plan</h6></th>
                                <th><h6>Zona</h6></th>
                                <th><h6>Cantidad</h6></th>
                                <th><h6>Fecha Pago</h6></th>
                                <th><h6>Creado</h6></th>
                                <th><h6>Acciones</h6></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($ca as $key=>$c) { ?>
                                        <tr>
                                            <td class="min-width">
                                            <p><?php echo $key+1; ?></p>
                                            </td>
                                            <td class="min-width">
                                            <p>{{ $c->nombre;}} {{ $c->Appaterno;}} {{ $c->ApMaterno;}}</p>
                                            </td>
                                            <td class="min-width">
                                            <p><?php echo $c->pl; ?></p>
                                            </td>
                                            <td class="min-width">
                                            <p><?php echo $c->zona; ?></p>
                                            </td>
                                            <td class="min-width">
                                            <p><?php echo $c->precio; ?></p>
                                            </td>
                                            <td class="min-width">
                                            <p><?php echo $c->FechaFin; ?></p>
                                            </td>
                                            <td class="min-width">
                                            <div class="action" style="font-size: 30px;">
                                                <a style="padding: 0px 6px 0px 0px;" href="{{action('App\Http\Controllers\ClienteController@show', $c->id)}}" class="text-primary"><li class="lni lni-dollar"></li></a>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        <!-- end table row -->
                            </tbody>
                        </table>
                            {{ $ca->withQueryString()->links() }}
                                    <!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                    <p>HOLA ADMINISTRADOR</p>
                    <a href="{{route('plans.index')}}">PLANES</a>
                    @else
                    <P>HOLA USUARIO NORMAL</P>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
