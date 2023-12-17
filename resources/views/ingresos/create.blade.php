@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Crear Ingreso</h2>
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
                                <a href="{{route('ingresos.index')}}">Ingresos</a>
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
          <h6 class="mb-25">Ingrese la información del ingreso</h6>
          <form class="form-horizontal" method="POST" action="{{ route('ingresos.store') }}">
            {{ csrf_field() }}
              <div class="input-style-2">
                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus placeholder="cantidad">
                <span class="icon"> <i class="lni lni-write"></i> </span>
                @error('cantidad')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="select-style-2">
                    <div class="select-position">
                      <select id="tpi_id" class="form-control @error('tpi_id') is-invalid @enderror" name="tpi_id" value="{{ old('tpi_id') }}" required autocomplete="tpi_id">
                      <option value="">    Seleccione un tipo ingreso    </option>
                        <?php
                            foreach ($tpi as $b) {
                            echo "<option value=\"";
                            echo $b->id;
                            echo "\">";
                            echo $b->nti;
                            echo"</option>";
                        }
                        ?>
                      </select>
                      @if ($errors->has('tpi_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('tpi_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="select-style-2">
                    <div class="select-position">
                      <select id="tpb_id" class="form-control @error('tpb_id') is-invalid @enderror" name="tpb_id" value="{{ old('tpb_id') }}" required autocomplete="tpb_id">
                      <option value="">    Seleccione un Banco</option>
                        <?php
                            foreach ($tpb as $a) {
                            echo "<option value=\"";
                            echo $a->id;
                            echo "\">";
                            echo $a->ntb;
                            echo"</option>";
                        }
                        ?>
                      </select>
                      @if ($errors->has('tpb_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('tpb_id') }}</strong>
                            </span>
                        @endif
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