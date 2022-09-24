@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Antenas</h2>
          <a href="{{route('antenas.create')}}" class="main-btn primary-btn btn-hover btn-sm">
          <i class="lni lni-plus mr-5"></i>Nuevo</a>
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
                Antenas
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
          <h6 class="mb-10">Tabla de antenas</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de las antenas con los que cuenta la empresa
          </p>
          <div class="table-wrapper table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>Nombre</h6></th>
                  <th><h6>Modo</h6></th>
                  <th><h6>Ip</h6></th>
                  <th><h6>Usuario</h6></th>
                  <th><h6>Contraseña</h6></th>
                  <th><h6>Usuario</h6></th>
                  <th><h6>SSID</h6></th>
                  <th><h6>Contraseña</h6></th>
                  <th><h6>Acciones</h6></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($at as $key=>$a) { ?>
                        <tr>
                          <td class="min-width">
                           <p><?php echo $key+1; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->nombre; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->modo; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->ip; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->usuario; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->pssw; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->ssid; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->password; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->created_at; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $a->updated_at; ?></p>
                          </td>
                          <td class="min-width">
                            <div class="action" style="font-size: 30px;">
                              <a style="padding: 0px 6px 0px 0px;" href="{{action('App\Http\Controllers\ClienteController@show', $a->id)}}" class="text-primary"><li class="lni lni-eye"></li></a>
                              <a href="{{action('App\Http\Controllers\ClienteController@edit', $a->id)}}" class="text-success"><li class="lni lni-write"></li></a>
                                <form action="{{action('App\Http\Controllers\ClienteController@destroy', $a->id)}}" method="post">
                                  {{csrf_field()}}
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="text-danger" type="submit"><i style="font-size: 30px;" class="lni lni-trash-can"> </i></button>
                                </form>
                            </div>
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