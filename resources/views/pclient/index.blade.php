@extends('layouts.vpc')

@section('content')

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
              <h2>CLIENTES</h2>
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
            <div class="col-xl-3 col-lg-3 col-md-2 col-sm-3">

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card-style-2 mb-30">
                    <div class="card-content">
                        <div class="header-search">
                            <form method="POST" action="{{ route('buscador') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" id="id" value="{{$idu}}">
                              <div class="input-style-3">
                                <input type="text" placeholder="Buscar" name="busqueda" id="busqueda" />
                                <span class="icon"><i class="lni lni-search-alt"></i></span>
                              </div>
                              <div class="butons-group">
                                    <button class="main-btn success-btn" type="submit">Buscar</button>
                              </div>
                            </form>
                        </div>
                       <hr>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-2col-sm-3">

            </div>
        </div>
        <!-- end row -->
        <!-- ========= card-style-2 end ========= -->
      </div>
      <!-- ========== cards-styles end ========== -->
    </div>
    <!-- end container -->
  </section>
@endsection