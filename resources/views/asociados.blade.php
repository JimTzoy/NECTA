@extends('layouts.vlogin')

@section('content')

{{$emp}}
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
                  <h2>ASOCIADOS</h2>
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
                @foreach ($emp as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-2 mb-30">
                        <div class="card-image">
                            <a href="#0">
                            <img
                                src="assets/images/cards/card-style-2/card-1.jpg"
                                alt=""
                            />
                            </a>
                        </div>
                        <div class="card-content">
                            <p class="text-muted">Empresa</p>
                            <h4>{{$item->NomComercial}}</h4>
                            <hr>
                            <p class="text-muted">Telefono</p>
                            <h4>{{$item->Telefono}}</h4>
                            <hr>
                            <div class="buttons-group">
                                <a href="{{route('index',$item->user_id)}}" class="main-btn primary-btn rounded-md btn-hover">Soy cliente</a>
                                <a href="#0" class="main-btn dark-btn rounded-md btn-hover">+ Información</a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->
            <!-- ========= card-style-2 end ========= -->
          </div>
          <!-- ========== cards-styles end ========== -->
        </div>
        <!-- end container -->
      </section>
@endsection