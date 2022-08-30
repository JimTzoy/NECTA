@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title d-flex align-items-center flex-wrap mb-30">
            <h2 class="mr-40">Zonas</h2>
            <a href="#" class="main-btn primary-btn btn-hover btn-sm">
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
                    zonas
                </li>
                </ol>
            </nav>
            </div>
        </div>
        <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== aqui va la informacion========== -->
    <div class="tables-wrapper">
        <h1>INFORMACION PARA ZONAS</h1>
    </div>
    <!-- end row -->
</div>
@endsection