@extends('layouts.vedit')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Actualizar Cliente</h2>
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
                                Actualizar
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
          <h6 class="mb-25">Ingrese la información de los clientes</h6>
          <form class="form-horizontal" method="POST" action="{{ route('clientes.update',$cliente->id) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
              <div class="input-style-2">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $cliente->Nombre }}" required >
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('nombre')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ApPaterno" type="text" class="form-control @error('ApPaterno') is-invalid @enderror" name="ApPaterno" value="{{ $cliente->ApPaterno }}" required autocomplete="ApPaterno" placeholder="Apellido Paterno">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ApPaterno')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ApMaterno" type="text" class="form-control @error('ApMaterno') is-invalid @enderror" name="ApMaterno" value="{{ $cliente->ApMaterno }}" required autocomplete="ApMaterno" placeholder="Apellido Materno">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ApMaterno')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="Telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror" name="Telefono" value="{{ $cliente->Telefono }}" required autocomplete="Telefono" placeholder="Teléfono">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('Telefono')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $cliente->Direccion }}" required autocomplete="direccion" placeholder="Dirección">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('direccion')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ $cliente->Ciudad }}" required autocomplete="ciudad" placeholder="Ciudad">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ciudad')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $cliente->Descripcion }}" required autocomplete="descripcion" placeholder="Descripción">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('descripcion')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="FechaContrato" type="date" class="form-control @error('FechaContrato') is-invalid @enderror" name="FechaContrato" value="{{ $cliente->FechaContrato }}" required autocomplete="FechaContrato" placeholder="Fecha Contrato">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('FechaContrato')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="FechaInicio" type="date" class="form-control @error('FechaInicio') is-invalid @enderror" name="FechaInicio" value="{{ $cliente->FechaInicio }}" required autocomplete="FechaInicio" placeholder="Fecha Inicio">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('FechaInicio')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="FechaFin" type="date" class="form-control @error('FechaFin') is-invalid @enderror" name="FechaFin" value="{{ $cliente->FechaFin }}" required autocomplete="FechaFin" placeholder="Fecha Fin">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('FechaFin')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="select-style-2">
                    <div class="select-position">
                      <select id="zona_id" class="form-control @error('zona_id') is-invalid @enderror" name="zona_id" value="" required autocomplete="zona_id">
                        <option value="{{ $cliente->zona_id }}"><?php foreach($zn as $b) {if($b->id == $cliente->zona_id){echo $b->clave;}} ?></option>
                        <?php
                            foreach ($zn as $b) {
                            echo "<option value=\"";
                            echo $b->id;
                            echo "\">";
                            echo $b->clave;
                            echo"</option>";
                        }
                        ?>
                      </select>
                      @if ($errors->has('zona_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('zona_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="input-style-2">
                <input id="idantena" type="text" class="form-control @error('idantena') is-invalid @enderror" name="idantena" value="{{ $cliente->idAntena}}" required autocomplete="idantena" placeholder="IP Antena">
                <span class="icon"> <i class="lni lni-dollar"></i> </span>
                @error('idantena')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
                <div class="select-style-2">
                    <div class="select-position">
                      <select id="plan_id" class="form-control @error('plan_id') is-invalid @enderror" name="plan_id" value="" required autocomplete="plan_id">
                        <option value="{{ $cliente->plan_id }}"><?php foreach($pl as $b) {if($b->id == $cliente->plan_id){echo $b->plan;}} ?></option>
                        <?php
                            foreach ($pl as $b) {
                            echo "<option value=\"";
                            echo $b->id;
                            echo "\">";
                            echo $b->plan;
                            echo"</option>";
                        }
                        ?>
                      </select>
                      @if ($errors->has('plan_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('plan_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- end select -->
              <button type="submit" class="main-btn success-btn rounded-md btn-hover">Actualizar</button>
          </form>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection