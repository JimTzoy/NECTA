@extends('layouts.vlogin')

@section('content')
{!! NoCaptcha::renderJs() !!}
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">HOLA</h1>
                    <p class="text-medium">
                      Cree la mejor experiencia
                      <br class="d-sm-block" />
                      para sus clientes
                    </p>
                </div>
                <div class="cover-image">
                    <img src="assets/images/auth/signin-image.svg" alt="" />
                </div>
                <div class="shape-image">
                    <img src="assets/images/auth/shape.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
        <!-- end col -->
    <div class="col-lg-6">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Formulario de registro</h6>
                  <p class="text-sm mb-25">
                    Cree la mejor experiencia para sus clientes
                  </p>
                  <form method="POST" action="{{ route('register') }}">
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
                      <!-- end col -->
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
                      <!-- end col -->
                      <div class="col-12">
                      {!! NoCaptcha::display() !!}
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
                  <div class="singup-option pt-40">
                    <p class="text-sm text-medium text-dark text-center">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Entre</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

@endsection
