@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                  <h6 class="mb-10">New Orders</h6>
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
                  <h6 class="mb-10">Total Income</h6>
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
                  <h6 class="mb-10">Total Expense</h6>
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
                  <h6 class="mb-10">New User</h6>
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
</div>
<li class="nav-item">
            <a href="{{ url('/home') }}">
              <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                  <path 
                    d="M128 110.4C160.8 110.4 187.6 137.2 187.6 170S160.8 230 128 230S68.4 203.2 68.4 170.4S95.2 110.4 128 110.4zM128 216C153.2 216 173.6 195.6 173.6 170.4C173.6 145.2 153.2 124.8 128 124.8C102.8 124.8 82.4 145.2 82.4 170.4C82.4 195.2 102.8 216 128 216zM248.4 38.4C215.2 66.8 172.4 82.4 128 82.4S40.8 66.8 7.6 38.4C4.4 36 4 31.6 6.8 28.4C9.2 25.6 13.6 25.2 16.8 27.6C47.6 53.6 87.2 68 128.4 68S209.2 53.6 240 27.6C241.2 26.4 242.8 26 244.4 26C246.4 26 248.4 26.8 249.6 28.4C252 31.6 251.6 36 248.4 38.4z"
                  ></path>
                </svg>
              </span>
              <span class="text">Usuarios</span>
            </a>
          </li>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                    <p>HOLA ADMINISTRADOR</p>
                    <a href="{{route('plans.index')}}">PLANES</a>
                    @else
                    <P>HOLA USUARIO NORMAL</P>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
