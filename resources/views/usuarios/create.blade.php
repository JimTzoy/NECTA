@extends('layouts.vistaa')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Crear Usuario</h2>
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
                                <a href="{{route('usuarios.index')}}">Usuarios</a>
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
          <h6 class="mb-25">Ingrese la información de los clientes</h6>
            <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Nombre</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Correo electrónico</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Contraseña</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <!-- end col -->
                       <div class="col-12">
                        <div class="input-style-1">
                          <label>Confirmar contraseña</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="select-style-2">
                            <div class="select-position">
                            <select id="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id">
                            <option value="">    Seleccione una Rol </option>
                                <?php
                                    foreach ($roles as $b) {
                                    echo "<option value=\"";
                                    echo $b->id;
                                    echo "\">";
                                    echo $b->name;
                                    echo"</option>";
                                }
                                ?>
                            </select>
                            @if ($errors->has('id'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                       
                          <button type="submit"
                            class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            "
                          >
                            Registrar
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
        </div>
      </div>
    <!-- end row -->
    </div>
  </div>
</div>
@endsection