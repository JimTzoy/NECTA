@extends('layouts.vlogin')

@section('content')
<div class="row g-0 auth-row">
    <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                    <h1 class="text-primary mb-10">Bienvenido de nuevo</h1>
                    <p class="text-medium">
                        Inicie sesión en su cuenta para continuar con la experiencia NECTA
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
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">INICIE SESION</h6>
                <p class="text-sm mb-25">
                    Bienvenido 
                </p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Correo electrónico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                      <!-- end col -->
                      <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div class="form-check checkbox-style mb-30">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div
                          class="
                            text-start text-md-end text-lg-start text-xxl-end
                            mb-30
                          "
                        >
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Has olvidado tu contraseña?') }}
                                    </a>
                                @endif
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div
                          class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          "
                        >
                          <button type="submit"
                            class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            "
                          >
                            Iniciar
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  <div class="singin-option pt-40">
                    <p class="text-sm text-medium text-center text-gray">
                    Registrese facilmente con
                    </p>
                    <div
                      class="
                        button-group
                        pt-40
                        pb-40
                        d-flex
                        justify-content-center
                        flex-wrap
                      "
                    >
                      <button class="main-btn primary-btn-outline m-2">
                        <i class="lni lni-facebook-filled mr-10"></i>
                        Facebook
                      </button>
                      <button class="main-btn danger-btn-outline m-2">
                        <i class="lni lni-google mr-10"></i>
                        Google
                      </button>
                    </div>
                    <p class="text-sm text-medium text-dark text-center">
                    ¿Aún no tienes ninguna cuenta?
                      <a href="{{ route('register') }}">Cree una cuenta</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->
@endsection
