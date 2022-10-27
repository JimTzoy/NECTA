@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Información cliente {{$cte->NoCliente}}</h2>
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
                                <a href="{{route('clientes.index')}}">Clientes</a>
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
  <div class="form-elements-wrapper">
    <div class="row">
      <div class="col-lg-6">
        <!-- input style start -->
        <div class="card-style mb-30">
          <h6 style="text-align:center ;" class="mb-30">General</h6>
          <hr>
          <div class="row">
            <div class="col-md-4">
                <p class="text-sm">Codigo Cliente</p><h5 class="mb-10">{{$cte->NoCliente}}</h5>
            </div>
            <div class="col-md-4">
                <p class="text-sm">Fecha Contrato</p><h5 class="mb-10">{{$cte->FechaContrato}}</h5>
            </div>
            <div class="col-md-4">
                <p class="text-sm">Nombre</p><h5 class="mb-10">{{$cte->Nombre}} {{$cte->ApPaterno}} {{$cte->ApMaterno}}</h5>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
                <p class="text-sm">Diercción</p><h5 class="mb-10">{{$cte->Direccion}}, {{$cte->Ciudad}}</h5>
            </div>
            <div class="col-md-6">
                <p class="text-sm">Telefono</p><h5 class="mb-10">{{$cte->Telefono}}</h5>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-8">
                <p class="text-sm">Descripción</p><h5 class="mb-10">{{$cte->Descripcion}}</h5>
            </div>
            <div class="col-md-4">
                <p class="text-sm">Zona</p><h5 class="mb-10"><?php foreach ($zn as $key=>$z) {if ($z->id == $cte->zona_id) {
                    echo $z->nombre;
                } }?></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- input style start -->
        <div class="card-style mb-30">
          <h6 class="mb-25">Información de pagos</h6>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection