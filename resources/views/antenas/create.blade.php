@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Crear Antenas</h2>
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
                                <a href="{{route('antenas.index')}}">Antenas</a>
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
          <h6 class="mb-25">Ingrese la información de las antenas</h6>
          <form class="form-horizontal" method="POST" action="{{ route('antenas.store') }}">
            {{ csrf_field() }}
              <div class="select-style-2">
                <div class="select-position">
                    <select id="modo" class="form-control @error('modo') is-invalid @enderror" name="modo" value="{{ old('modo') }}" required autocomplete="modo" autofocus>
                        <option value="">  Seleccione una opción   </option>
                        <option value="PtP">Antena PtP</option>
                        <option value="ESTACIÓN">Antena Estación</option>
                        <option value="PtPM">Antena PtMP</option>
                    </select>
                    @error('modo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              <div class="input-style-2">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus placeholder="Nombre">
                <span class="icon"> <i class="lni lni-information"></i> </span>
                @error('nombre')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ip" type="text" class="form-control @error('ip') is-invalid @enderror" name="ip" value="{{ old('ip') }}" required autocomplete="ip" autofocus placeholder="Ip">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ip')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" autofocus placeholder="Usuario">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('usuario')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="pssw" type="text" class="form-control @error('pssw') is-invalid @enderror" name="pssw" value="{{ old('pssw') }}" required autocomplete="pssw" autofocus placeholder="Contraseña">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('pssw')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="ssid" type="text" class="form-control @error('ssid') is-invalid @enderror" name="ssid" value="{{ old('ssid') }}" required autocomplete="ssid" autofocus placeholder="SSID">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('ssid')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Contraseña">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button type="submit" class="main-btn success-btn rounded-md btn-hover">Registrar</button>
          </form>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection