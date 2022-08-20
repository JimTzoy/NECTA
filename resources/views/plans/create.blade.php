@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Crear plan</h2>
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
                                <a href="{{route('plans.index')}}">Planes</a>
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
          <h6 class="mb-25">Ingrese la informacion de los planes</h6>
          <form class="form-horizontal" method="POST" action="{{ route('plans.store') }}">
            {{ csrf_field() }}
              <div class="input-style-2">
                <input id="plan" type="text" class="form-control @error('plan') is-invalid @enderror" name="plan" value="{{ old('plan') }}" required autocomplete="plan" autofocus placeholder="Nombre del plan">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('plan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="input-style-2">
                <input id="informacion" type="text" class="form-control @error('informacion') is-invalid @enderror" name="informacion" value="{{ old('informacion') }}" required autocomplete="informacion" autofocus placeholder="Información">
                <span class="icon"> <i class="lni lni-information"></i> </span>
                @error('informacion')
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