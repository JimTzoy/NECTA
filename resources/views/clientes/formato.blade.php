@extends('layouts.vedit')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-4">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Clientes</h2>
          <a href="{{route('imprimir',$id_user)}}" class="main-btn info-btn btn-hover btn-sm">
            <i class="lni lni-printer mr-5"></i>Imprimir</a>
        </div>
      </div>
      <div class="col-md-4">
      </div>
      <!-- end col -->
      <div class="col-md-4">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('/home') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Clientes
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
          <h6 class="mb-10">Tabla de clientes</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de los clientes con los que cuenta la empresa
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>NoCliente</h6></th>
                  <th><h6>Nombre</h6></th>
                  <th><h6>Apellido Paterno</h6></th>
                  <th><h6>Apellido Materno</h6></th>
                  <th><h6>Fecha Inicio</h6></th>
                  <th><h6>Fecha Fin</h6></th>
                  <th><h6>Dirección</h6></th>
                  <th><h6>Telefono</h6></th>
                  <th><h6>Pago</h6></th>
                </tr>
              </thead>
                <tbody>
                    <?php foreach ($ci as $key=>$c) { ?>
                          <tr>
                            <td class="min-width">
                            <p><?php echo $key+1; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->NoCliente; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->Nombre; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->ApPaterno; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->ApMaterno; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->FechaInicio; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->FechaFin; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $c->Direccion; ?> </p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $c->Telefono; ?></p>
                            </td>
                            <td class="min-width">
                                <?php foreach ($pl as $key=>$p) { 
                                    if($p->id == $c->plan_id){
                                        echo "$ ".$p->precio." MXN";
                                    }
                                } ?>
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