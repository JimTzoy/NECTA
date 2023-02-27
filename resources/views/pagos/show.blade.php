@extends('layouts.vistaa')

@section('content')
<style>
  .text2{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.23em;
    color: #254f5a;

  }
</style>
<input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="titlemb-30">
                    <h2>Información del pago</h2>
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
                                <a href="{{action('App\Http\Controllers\ClienteController@show',$cte->id)}}">Pagos</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Ver
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
    <!-- Invoice Wrapper Start -->
    <div class="invoice-wrapper">
      <div class="invoice-card card-style mb-30">
        <div class="row" style="text-align: center;">
          <div class="col-12">
            <h2 class="mb-10">Recibo pago de internet</h2>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-6 col-sm-6 col-md-6" style="border-right: 1px solid #9e9c9c;">
            <p>Recibi de:</p>
            <p class="text2">{{$cte->Nombre}} {{$cte->ApPaterno}} {{$cte->ApMaterno}}</p>
          </div>
          <div class="col-3 col-sm-3 col-md-3" style="border-right: 1px solid #9e9c9c;">
            <p>Cantidad</p>
            <p class="text2">$ {{$pago->cantidad}} MXN</p>
          </div>
          <div class="col-3 col-sm-3 col-md-3">
            <p>Fecha</p>
            <p class="text2">@foreach ($va as $item)
              {{date("d-m-Y", strtotime($item->created_at))}}
          @endforeach</p>
          </div>
        </div>
        <hr>
        <p>Información del mes pagado</p>
        <div class="row">
          <div class="col-6" style="border-right: 1px solid #9e9c9c;">
            <p>Fecha Inicio</p>
            <p class="text2">@foreach ($va as $item)
              {{date("d-m-Y", strtotime($item->FechaInicio))}}
          @endforeach</p>
          </div>
          <div class="col-6">
              <p>Fecha Fin</p>
              <p class="text2">@foreach ($va as $item)
                {{date("d-m-Y", strtotime($item->FechaFin))}}
            @endforeach</p>
          </div>
        </div>
        <hr>
        <br>
        <p>Si tiene alguna duda con su recibo favor de comunicarse con nostros, igual si su servicio presenta fallas no dude en reportar los problemas que presenta su servicio</p>
        <br>
        <hr>
        <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6">
            <p>Su siguiente pago es</p>
            <p class="text2">@foreach ($va as $item)
              {{date("d-m-Y", strtotime($item->FechaFin))}}
          @endforeach</p>
          </div>
        </div>
      </div>
      <!-- End Card -->
    </div>
    <!-- Invoice Wrapper End -->
</div>
@endsection