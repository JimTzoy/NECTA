@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @if(Auth::user()->hasRole('admin'))
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    Dashboard NECTA
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
                                Home
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
    <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-cart-full"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Nuevos ventas</h6>
                  <h3 class="text-bold mb-10">34567</h3>
                  <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i> +2.00%
                    <span class="text-gray">(30 days)</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-dollar"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total de clientes</h6>
                  <h3 class="text-bold mb-10">$74,567</h3>
                  <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i> +5.45%
                    <span class="text-gray">Increased</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-credit-cards"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Clientes atrasados</h6>
                  <h3 class="text-bold mb-10">$24,567</h3>
                  <p class="text-sm text-danger">
                    <i class="lni lni-arrow-down"></i> -2.00%
                    <span class="text-gray">Expense</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-user"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Ingresos Mensuales</h6>
                  <h3 class="text-bold mb-10">34567</h3>
                  <p class="text-sm text-danger">
                    <i class="lni lni-arrow-down"></i> -25.00%
                    <span class="text-gray"> Earning</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
          @else
          @if(Auth::user()->hasRole('empresa'))
              <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    Dashboard NECTA
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
                                Home
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
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-user"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Nuevos clientes</h6>
                  <h3 class="text-bold mb-10"> <?php foreach($c as $v){ echo $v->total;} ?></h3>
                  <p class="text-sm text-success">
                    <i class="lni lni-arrow-up"></i>
                    <span class="text-gray">(30 Dias)</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total de clientes</h6>
                  <h3 class="text-bold mb-10"> <?php foreach($ct as $vt){ echo $vt->total;} ?></h3>
                  <p class="text-sm text-success">
                    <span class="text-gray">Incremento</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-user"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Clientes atrasados</h6>
                  <h3 class="text-bold mb-10"><?php foreach($at as $va){ echo $va->total;} ?></h3>
                  <p class="text-sm text-danger">
                    <a href="{{ url('/verlista') }}"><span class="text-gray">Ver Lista</span></a>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <i class="lni lni-dollar"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Ingresos Mensuales</h6>
                  <h3 class="text-bold mb-10"><?php foreach($t as $t){?><?php echo "$ ".$t->u; } ?></h3>
                  <p class="text-sm text-danger">
                    <span class="text-gray">(30 Dias)</span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
          @else
          @if(Auth::user()->hasRole('cobrador'))
                      <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="titlemb-30">
                            Dashboard NECTA
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
                                        Home
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
            <div class="row">
              @if (isset($clc))
                <p>Aqui se muestran los clientes vencidos, pero por el momento no hay.</p>
                @else
              @foreach ($clc as $clc)
              <div class="col-xl-4 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                  <div class="icon" style="color: #970606;">
                    <i class="lni lni-revenue"></i>
                  </div>
                  <div class="content">
                    <h6 class="mb-10">{{$clc->Nombre}} {{$clc->ApPaterno}} {{$clc->ApMaterno}}</h6>
                    <p class="text-gray">Fecha Pago:</p>
                    <h3 class="text-bold mb-10">{{date("d-m-Y", strtotime($clc->FechaFin))}}</h3>
                    <p class="text-sm text-danger">
                      <span class="text-gray"></span>
                    </p>
                    <div style="text-align:right;">
                      <a href="#0" class="main-btn danger-btn square-btn btn-hover">Pagar</a>
                    </div>
                  </div>
                </div>
                <!-- End Icon Cart -->
              </div>
              @endforeach
              @endif

            </div>

          @else
          @if(Auth::user()->hasRole('finanzas'))
              <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
              <div class="row align-items-center">
                  <div class="col-md-6">
                      <div class="titlemb-30">
                          Dashboard 
                          <a class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Traspaso <i class="lni lni-plus mr-5"></i></a>
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
                                      Home
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
          <div class="row">
            <?php
             foreach ($bancos as $banco) {
              $totalIngresos = $banco->ingresosxbanco->sum('cantidad');
              $totalGastos = $banco->gastosxbanco->sum('cantidad');
              $saldoPorBanco = $totalIngresos - $totalGastos;
              ?>
              <a class="col-xl-2 col-lg-3 col-sm-3" href="{{ action('App\Http\Controllers\TipoBancoController@show', $banco->id) }}">
                <div class="icon-card mb-30">
                <div class="content">
                  <h6 class="mb-10"><?php echo $banco->ntb; ?></h6>
                  <h3 class="text-bold mb-10"><?php echo "$ ".$saldoPorBanco ; ?></h3>
                  <p class="text-mediun text-success">
                    <i class="lni lni-arrow-up"></i> <?php echo "$ ".$totalIngresos; ?>
                    <span class="text-danger"><i class="lni lni-arrow-down"></i> <?php echo "$ ".$totalGastos;  ?></span>
                  </p>
                </div>
              </div>
              <!-- End Icon Cart -->
             </a>  
            <?php
              }
            ?>
          </div>
          @endif
          @endif
          @endif
          @endif
</div>
<!------------------------->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Traspaso Entre Bancos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('bancos.store') }}">
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
                      <select id="tpb_id" class="form-control @error('tpb_id') is-invalid @enderror" name="tpb_id" value="{{ old('tpb_id') }}" required autocomplete="tpb_id">
                      <option value="">    Seleccione banco a RETIRAR</option>
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
              <div class="select-style-2">
                    <div class="select-position">
                      <select id="tpb_ide" class="form-control @error('tpb_ide') is-invalid @enderror" name="tpb_ide" value="{{ old('tpb_ide') }}" required autocomplete="tpb_ide">
                      <option value="">    Seleccione Banco a INGRESAR</option>
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
          
      </div>
      <div class="modal-footer">
        <button type="button" class="main-btn danger-btn rounded-md btn-hover" data-bs-dismiss="modal">Salir</button>
        <button type="submit" class="main-btn success-btn rounded-md btn-hover">Guardar</button>
      </div>
      </form>
    </div>
  </div>
@endsection
