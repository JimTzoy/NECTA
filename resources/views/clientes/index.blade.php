@extends('layouts.app')

@section('content')

@if(Auth::user()->hasRole('empresa'))
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Clientes</h2>
          <a href="{{route('clientes.create')}}" class="main-btn primary-btn btn-hover btn-sm">
          <i class="lni lni-plus mr-5"></i>Nuevo</a>
          <a href="{{url('clientes/formato',$id_user)}}" class="main-btn info-btn btn-hover btn-sm">
            <i class="lni lni-printer mr-5"></i>Imprimir</a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="header-search d-none d-md-flex">
          <form>
            <div class="input-style-3">
              <input type="text" placeholder="Buscar" name="busqueda" id="busqueda" />
              <span class="icon"><i class="lni lni-search-alt"></i></span>
            </div>
          </form>
        </div>
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
                  <th><h6>Creado</h6></th>
                  <th><h6>Actualizado</h6></th>
                  <th><h6>Acciones</h6></th>
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
                              <p><?php echo $c->created_at; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->updated_at; ?></p>
                            </td>
                            <td class="min-width">
                              <div class="action" style="font-size: 30px;">
                                <a style="padding: 0px 6px 0px 0px;" href="{{action('App\Http\Controllers\ClienteController@show', $c->id)}}" class="text-primary"><li class="lni lni-eye"></li></a>
                                <a href="{{action('App\Http\Controllers\ClienteController@edit', $c->id)}}" class="text-success"><li class="lni lni-write"></li></a>
                                  <form action="{{action('App\Http\Controllers\ClienteController@destroy', $c->id)}}" method="post">
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
              {{ $ci->withQueryString()->links() }}
                    <!-- end table -->
            </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
</div>
@else
@if(Auth::user()->hasRole('cobrador'))
<div class="container-fluid">
  <!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="title d-flex align-items-center flex-wrap mb-30">
        <h2 class="mr-40">Clientes</h2>
      </div>
    </div>
    <div class="col-md-3">
      <div class="header-search d-none d-md-flex">
        <form>
          <div class="input-style-3">
            <input type="text" placeholder="Buscar" name="busqueda" id="busqueda" />
            <span class="icon"><i class="lni lni-search-alt"></i></span>
          </div>
        </form>
      </div>
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
                <th><h6>Creado</h6></th>
                <th><h6>Actualizado</h6></th>
                <th><h6>Acciones</h6></th>
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
                            <p><?php echo $c->created_at; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $c->updated_at; ?></p>
                          </td>
                          <td class="min-width">
                            <div class="action" style="font-size: 30px;">
                              <a style="padding: 0px 6px 0px 0px;" href="{{action('App\Http\Controllers\ClienteController@show', $c->id)}}" class="text-primary"><li class="lni lni-eye"></li></a>
                              <a href="{{action('App\Http\Controllers\ClienteController@edit', $c->id)}}" class="text-success"><li class="lni lni-write"></li></a>
                                
                            </div>
                          </td>
                        </tr>
                  <?php } ?>
                        <!-- end table row -->
                </tbody>
            </table>
            {{ $ci->withQueryString()->links() }}
                  <!-- end table -->
          </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
</div>
@else
@endif
@endif
@endsection