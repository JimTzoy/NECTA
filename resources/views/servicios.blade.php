@extends('layouts.inicio')

@section('content')

 <!-- Masthead-->
 <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenido a NECTA</div>
                <div class="masthead-heading text-uppercase">ENCANTADO DE CONOCERTE</div>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">Ofrecemos lo que los clientes necesitan</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wifi fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Provedor de Internet</h4>
                        <p class="text-muted">Nos dedicamos a proveer servicios de internet a comunidades retiradas</p>
                        <a class="btn btn-primary btn-xl text-uppercase" href="InternetNecta">Conocer Mas</a>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Diseño web</h4>
                        <p class="text-muted">le ayudamos a diseñar y desarrollar su idea o concepto de pagina </p>
                        <a class="btn btn-primary btn-xl text-uppercase" href="InternetNecta">Conocer Mas</a>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-comments-question fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Soporte Tecnico</h4>
                        <p class="text-muted">Solucionamos problemas </p>
                        <a class="btn btn-primary btn-xl text-uppercase" href="InternetNecta">Conocer Mas</a>
                    </div>
                </div>
            </div>
        </section>
        
@endsection
