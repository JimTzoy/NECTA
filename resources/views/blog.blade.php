@extends('layouts.inicio')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

    .st1{
        font-size: 1.5em;
        font-family: 'Source Sans Pro', sans-serif;
    }
    .b{
        text-decoration: none;
    }
    .a{
        height:200px;
        padding: 50px 50px 50px 50px;
    }
  </style>
<header class="masthead">
    <div class="container">
        <div class="masthead-heading">BLOG NECTA</div>
        <div class="masthead-subheading text-uppercase">Aprendiendo Cosas nuevas</div>
    </div>
</header>
<div class="page-section" >
    <div class="container-fluid" style="text-align: center;">
        <p class="mb-30 st1 ">
           Bienvenido al blog de NECTA, en esta sección hablaremos de diferentes temas en los que he aprendido de manera de manera personal, espero y les ayude a ustedes.
        </p>
        <div class="row">
            <div class="col-6 col-md-3 a" style="background-image: url('/img/a4.png');">
                <a href="#" class=" b main-btn primary-btn square-btn btn-hover">LARAVEL</a>
            </div>
            <div class="col-6 col-md-3 a" style="background-image: url('/img/a2.png'); ">
                <a href="#" class=" b main-btn primary-btn square-btn btn-hover">PHP</a>
            </div>
            <div  class="col-6 col-md-3 a" style="background-image: url('/img/a3.png');">
                <a href="#" class=" b main-btn primary-btn square-btn btn-hover">MYSQL</a>
            </div>
            <div  class="col-6 col-md-3 a" style="background-image: url('/img/a1.png');">
                <a href="#" class=" b main-btn primary-btn square-btn btn-hover">UBIQUITI</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8 col-md-8">
                <p class="st1">Publicaciones recientes</p>
            <div class="card">
                <a href="{{ url('/ubiquitipost') }}">Publicacion 1</a>
            </div>
            </div>
            <div class="col-4 col-md-4">
    
            </div>
        </div>
    </div>
</div>

@endsection
