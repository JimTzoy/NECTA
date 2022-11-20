@extends('layouts.vistaa')

@section('content')
<input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
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
          <div>
            <ul class="buttons-group" >
                <li>
                  <button type="button"  data-bs-toggle="modal" data-bs-target="#pagoCliente" class="main-btn secondary-btn rounded-md btn-hover">Pagar</button>
                </li>
                <li>
                  <a href="#0" class="main-btn danger-btn rounded-md btn-hover">Suspender</a>
                </li>
                <li>
                  <a href="{{action('App\Http\Controllers\ClienteController@edit', $cte)}}" class="main-btn success-btn rounded-md btn-hover">Actualizar</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- input style start -->
        <div class="card-style mb-30" style="<?php if ($cte->FechaFin >= $date) {?>box-shadow: 0px 0px 6px #219653; <?php }else{?>box-shadow: 0px 0px 6px #f7c800;<?php } ?>">
          <div class="row">
            <div class="col-md-6">
              <h6 class="mb-25">Información de pagos</h6>
            </div>
            <div class="col-md-6" style="text-align: right ;">
              <?php if ($cte->FechaFin >= $date) {
            ?>
              <div>
                <h2 class="mb-10" style="color:#219653;">A</h2>
              </div>
              <?php }else{?>
                <h2 class="mb-10" style="color:#f7c800;">P</h2>
            <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <p class="text-sm">Inicio</p><h5 class="mb-10"><?php echo date("d-m-Y", strtotime($cte->FechaInicio));?></h5>
            </div>
            <div class="col-md-5">
              <p class="text-sm">Fin</p><h5 class="mb-10"><?php echo date("d-m-Y", strtotime($cte->FechaFin));?></h5>
            </div>
            <div class="col-md-2">
              <p class="text-sm">Dia</p><h5 class="mb-10"><?php echo date("d", strtotime($cte->FechaFin));?></h5>
            </div>
          </div>
          <p class="text-sm">Muestra los pagos registrados del cliente</p>
          <div class="table-wrapper table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>Folio</h6></th>
                  <th><h6>Cantidad</h6></th>
                  <th><h6>Tipo pago</h6></th>
                  <th><h6>Fecha pago</h6></th>
                  <th><h6>Creado</h6></th>
                  <th><h6>Acciones</h6></th>
                </tr>
              </thead>
                <tbody>
                    <?php foreach ($pg as $key=>$p) { ?>
                          <tr>
                            <td class="min-width">
                            <p><?php echo $key+1; ?></p>
                            </td>
                            <td class="min-width">
                              <p>00<?php echo $p->id; ?></p>
                            </td>
                            <td class="min-width">
                              <p>$<?php echo $p->cantidad; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $p->tipo; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $p->fecha; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $p->created_at; ?></p>
                            </td>
                            <td class="min-width">
                              <div class="action" style="font-size: 30px;">
                                <a style="padding: 0px 6px 0px 0px;" href="{{action('App\Http\Controllers\PagosController@show', $p->id)}}" class="text-primary"><li class="lni lni-eye"></li></a>
                              </div>
                            </td>
                          </tr>
                    <?php } ?>
                          <!-- end table row -->
                  </tbody>
              </table>
              {{ $pg->withQueryString()->links() }}
                    <!-- end table -->
            </div>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pagoCliente" tabindex="-1" aria-labelledby="Modalpago" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Mpdalpago">Información de pago</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-elements-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <!-- input style start -->
              <div class="">
                <form class="form-horizontal" method="POST" action="{{ route('pagos.store') }}">
                  {{ csrf_field() }}
                      <input type="hidden" name="idcliente" value="{{$idc}}">
                      <div class="input-style-2">
                        <input type="date" name="FechaFin" value="{{$cte->FechaFin}}" class="form-control @error('FechaFin') is-invalid @enderror">
                        <span class="icon"> <i class="lni lni-calendar"></i> </span>
                          @error('FechaFin')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    <div class="input-style-2">
                      <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus placeholder="cantidad">
                      <span class="icon"> <i class="lni lni-dollar"></i> </span>
                      @error('cantidad')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-style-2">
                      <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus placeholder="fecha">
                      <span class="icon"> <i class="lni lni-dollar"></i> </span>
                      @error('fecha')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-style-2"> 
                      <input id="observaciones" type="text" class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" value="{{ old('observaciones') }}" required autocomplete="observaciones" autofocus placeholder="observaciones">
                      <span class="icon"> <i class="lni lni-dollar"></i> </span>
                      @error('observaciones')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="input-style-2">
                      <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo" autofocus placeholder="tipo">
                      <span class="icon"> <i class="lni lni-dollar"></i> </span>
                      @error('tipo')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
               
              </div>
            </div>
          <!-- end row -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="main-btn dark-btn rounded-md btn-hover" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="main-btn success-btn rounded-md btn-hover">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection