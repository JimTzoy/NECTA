@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Pagos</h2>
        </div>
      </div>
      <div class="col-md-3">
      </div>
      <!-- end col -->
      <div class="col-md-3">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('/home') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Pagos
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
  </div>
    <!-- ========== informacion de los clentes ========== -->
  <div class="tables-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <h6 class="mb-10">Tabla de Pagos</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de los pagos cobrados
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>Cantidad</h6></th>
                  <th><h6>Fecha Pago</h6></th>
                  <th><h6>Cliente</h6></th>
                  <th><h6>Recibio</h6></th>
                  
                </tr>
              </thead>
                <tbody>
                    <?php foreach ($pago as $key=>$c) { ?>
                          <tr>
                            <td class="min-width">
                            <p><?php echo $key+1; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo "$ ".$c->cantidad." MXN"; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo date("d-m-Y", strtotime($c->fecha)); ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->Nombre." ".$c->ApPaterno." ".$c->ApMaterno; ?></p>
                            </td>
                            <td>
                                <a href="{{route('imprimirticket',$c->id)}}" class="main-btn info-btn btn-hover btn-sm">
                                    <i class="lni lni-printer mr-5"></i>Imprimir</a>
                            </td>
                          </tr>
                    <?php } ?>
                          <!-- end table row -->
                  </tbody>
              </table>
                    <!-- end table -->
            </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
</div>
@endsection