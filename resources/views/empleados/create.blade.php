@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Crear Empleado</h2>
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
                                <a href="{{route('empleados.index')}}">Clientes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Crear
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
          <h6 class="mb-25">Ingrese la información del empleado</h6>
          <form class="form-horizontal" method="POST" action="{{ route('empleados.store') }}">
            {{ csrf_field() }}
              <div class="input-style-2">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus placeholder="Nombre">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('nombre')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ApPaterno" type="text" class="form-control @error('ApPaterno') is-invalid @enderror" name="ApPaterno" value="{{ old('ApPaterno') }}" required autocomplete="ApPaterno" autofocus placeholder="Apellido Paterno">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ApPaterno')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ApMaterno" type="text" class="form-control @error('ApMaterno') is-invalid @enderror" name="ApMaterno" value="{{ old('ApMaterno') }}" required autocomplete="ApMaterno" autofocus placeholder="Apellido Materno">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ApMaterno')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="Telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror" name="Telefono" value="{{ old('Telefono') }}" required autocomplete="Telefono" autofocus placeholder="Teléfono">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('Telefono')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus placeholder="Dirección">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('direccion')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ old('ciudad') }}" required autocomplete="ciudad" autofocus placeholder="Ciudad">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ciudad')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
             
              <div class="select-style-2">
                    <div class="select-position">
                      <select id="zona_id" class="form-control @error('zona_id') is-invalid @enderror" name="zona_id" value="{{ old('zona_id') }}" required autocomplete="zona_id">
                      <option value="">    Seleccione una Zona     </option>
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
                <div class="col-12">
                    <div class="select-style-2">
                        <div class="select-position">
                        <select id="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id">
                        <option value="">    Seleccione una Rol </option>
                        <option value="5">Cobrador</option>
                        <option value="6">Tecnico</option>
                        </select>
                        @if ($errors->has('id'))
                                <span class="help-block">
                                <strong>{{ $errors->first('id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                  </div>
                
                <!-- end select -->
              <button type="submit" class="main-btn success-btn rounded-md btn-hover">Registrar</button>
          </form>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection