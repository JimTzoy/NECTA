@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Realizar pago</h2>
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
                                <a href="{{route('pagos.index')}}">Pagos</a>
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
          <h6 class="mb-25">Ingrese la información de los planes</h6>
          <form class="form-horizontal" method="POST" action="{{ route('pagos.store') }}">
            {{ csrf_field() }}
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
                <input id="fecha" type="text" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus placeholder="fecha">
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
              <button type="submit" class="main-btn success-btn rounded-md btn-hover">Registrar</button>
          </form>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection