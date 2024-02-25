@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>INGRESOS Y GASTOS DE {{ $banco->ntb }}</h2>
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
                                Ver
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
            <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <!-- Invoice Wrapper Start -->
    <div class="invoice-wrapper">
        <div class="invoice-card card-style mb-30">
            <div class="row">
                <div class="col-md-6 orange-alert">
                    <div class="table-wrapper table-responsive orange-alert">
                        <table class="table striped-table">
                            <thead>
                                <tr class="text-success">
                                    <th>ID</th>
                                    <th>CANTIDAD</th>
                                    <th>TIPO</th>
                                    <th>FECHA</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banco->ingresos as $key=>$ingreso)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><i class="lni lni-arrow-up text-success"> + </i> $ {{ $ingreso->cantidad }}</td>
                                    <td>{{ $ingreso->tipoingreso->nti }}, {{$ingreso->concept}}</td>
                                    <td>{{ $ingreso->tipoingreso->created_at }}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-wrapper table-responsive">
                        <table class="table striped-table">
                            <thead>
                                <tr class="text-danger">
                                    <th>ID</th>
                                    <th>CANTIDAD</th>
                                    <th>TIPO</th>
                                    <th>FECHA</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banco->gastos as $key=>$gasto)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><i class="lni lni-arrow-down text-danger"> - </i> $ {{ $gasto->cantidad }}</td>
                                    <td>{{ $gasto->tipogasto->ntg }}</td>
                                    <td>{{ $gasto->tipogasto->created_at }}</td>
                                    <td></td>
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
@endsection