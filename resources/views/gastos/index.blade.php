@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Gastos </h2>
          <a href="{{route('gastos.create')}}" class="main-btn primary-btn btn-hover btn-sm"> Nuevo <i class="lni lni-plus mr-5"></i></a>
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
                Gastos
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
          <h6 class="mb-10">Tabla de gastos</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de los gastos realizados
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>Cantidad</h6></th>
                  <th><h6>Tipo gasto</h6></th>
                  <th><h6>Banco</h6></th>
                  <th><h6>Fecha</h6></th>
                  
                </tr>
              </thead>
                <tbody>
                    <?php foreach ($gastos as $key=>$g) { ?>
                          <tr>
                            <td class="min-width">
                            <p><?php echo $key+1; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo "$ ".$g->cantidad." MXN"; ?></p>
                            </td>
                            <td class="min-width">
                            <p><?php echo $g->tipoBanco->ntb; ?></p>
                            </td>
                            <td class="min-width">
                            <p><?php echo $g->tipoGasto->ntg; ?></p>
                            </td>
                            <td class="min-width">
                            <p><?php echo date("d-m-Y", strtotime($g->created_at)); ?></p>
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