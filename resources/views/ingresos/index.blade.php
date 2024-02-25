@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title d-flex align-items-center flex-wrap mb-30">
          <h2 class="mr-40">Ingresos </h2>
          <a class="main-btn primary-btn btn-hover btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Nuevo <i class="lni lni-plus mr-5"></i></a>
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
                Ingresos
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
          <h6 class="mb-10">Tabla de Ingresos</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de los ingresos
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
                    <?php foreach ($ingresos as $key=>$g) { ?>
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
                            <p><?php echo $g->tipoIngreso->nti; ?></p>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo Ingreso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" method="POST" action="{{ route('ingresos.store') }}">
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
                      <select id="tpi_id" class="form-control @error('tpi_id') is-invalid @enderror" name="tpi_id" value="{{ old('tpi_id') }}" required autocomplete="tpi_id">
                      <option value="">    Seleccione un tipo ingreso    </option>
                        <?php
                            foreach ($tpi as $b) {
                            echo "<option value=\"";
                            echo $b->id;
                            echo "\">";
                            echo $b->nti;
                            echo"</option>";
                        }
                        ?>
                      </select>
                      @if ($errors->has('tpi_id'))
                            <span class="help-block">
                            <strong>{{ $errors->first('tpi_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="select-style-2">
                    <div class="select-position">
                      <select id="tpb_id" class="form-control @error('tpb_id') is-invalid @enderror" name="tpb_id" value="{{ old('tpb_id') }}" required autocomplete="tpb_id">
                      <option value="">    Seleccione un Banco</option>
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
</div>
@endsection