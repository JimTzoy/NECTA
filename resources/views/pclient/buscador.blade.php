@extends('layouts.vpc')

@section('content')
<br>
<br>
<br>
  <!-- ========== card components start ========== -->
  <section class="card-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-3">

            </div>
          <div class="col-md-6">
            <div class="title mb-30" style="text-align: center;">
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-3">
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- ========== title-wrapper end ========== -->
        <div class="row">
            <div class="col-xl-1">

            </div>
            <div class="col-xl-10">
                <div class="card-style-2 mb-30" style="text-align: center">
                    <h3 class=" title mb-30">Información del cliente</h3>
                    <p class="text-muted">Si esta de acuerdo con la informacion proporcionada puede proceder a registrar su pago. si no quiere registrar o no sale su usuario no puede salir. <a href="{{route('index',$user_id)}}">Aqui</a></p>
                    <div class="card-content">
                       <div class="table-wrapper table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th><h6>#</h6></th>
                              <th><h6>Información cliente</h6></th>
                              <th><h6>Fecha inicio</h6></th>
                              <th><h6>Fecha fin</h6></th>
                              <th><h6>Apellido Materno</h6></th>
                              <th><h6>Acciones</h6></th>
                            </tr>
                          </thead>
                            <tbody>
                                <?php foreach ($client as $key=>$c) { ?>
                                      <tr>
                                        <td class="min-width">
                                        <p><?php echo $key+1; ?></p>
                                        </td>
                                        <td class="min-width">
                                          <p><?php echo $c->NoCliente." ".$c->Nombre." ".$c->ApPaterno." ".$c->ApMaterno; ?></p>
                                        </td>
                                        <td class="min-width">
                                          <p><?php echo $c->FechaInicio; ?></p>
                                        </td>
                                        <td class="min-width">
                                          <p><?php echo $c->FechaFin; ?></p>
                                        </td>
                                        <td class="min-width">
                                          <p><?php echo $c->plan_id;?></p>
                                        </td>
                                        <td>
                                            <button type="button"  data-bs-toggle="modal" data-bs-target="#pagoCliente" class="main-btn secondary-btn rounded-md btn-hover">Pagar</button>
                                        </td>
    
                                      </tr>
                                <?php } ?>
                                      <!-- end table row -->
                              </tbody>
                          </table>
                          {{ $client->withQueryString()->links() }}
                                <!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-1">

            </div>
        </div>
        <!-- end row -->
        <!-- ========= card-style-2 end ========= -->
      </div>
      <!-- ========== cards-styles end ========== -->
    </div>
    <!-- end container -->

    <br><br><br><br><br><br><br><br><br>


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
                  <form class="form-horizontal" id="frm1" method="POST" action="{{ route('pclient.store') }}">
                    {{ csrf_field() }}
                        <input type="hidden" name="idcliente" value="{{$user_id}}">
                        <div class="input-style-2">
                          <input type="date" name="FechaFin" value="" class="form-control @error('FechaFin') is-invalid @enderror">
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
                        <select id="tipo" class="form-control" name="tipo" value="{{ old('tipo') }}" required autofocus>
                          <option value=""><---Seleccione una opción---></option>
                          <?php
                          foreach ($tp as $tipoPago) {
                          echo "<option value=\"";
                          echo $tipoPago->id;
                          echo "\">";
                          echo $tipoPago->name."  ";
                          echo"</option>";
                          }
                          ?>
                  </select>
                        <span class="icon"> <i class="lni lni-dollar"></i> </span>
                        @error('tipo')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-style-2 oculto efectivo">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="" placeholder="Nombre">
                        <span class="icon"> <i class="lni lni-dollar"></i> </span>
                        @error('fecha')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="input-style-2 oculto banco">
                        <input id="img" type="file" class="form-control" name="img" value="{{ old('img') }}" accept="image/*" ><span class="icon"> <i class="lni lni-information"></i> </span>
                        @error('img')
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
  

  </section>
@endsection