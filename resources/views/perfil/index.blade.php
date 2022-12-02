@extends('layouts.app')

@section('content')
<?php


 $users = auth()->user();?>
<div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title d-flex align-items-center flex-wrap mb-30">
            <h2 class="mr-40">Configuración de la cuenta</h2>
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
                    Perfil
                </li>
                </ol>
            </nav>
            </div>
        </div>
        <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <div class="row">
            <div class="col-lg-6">
              <div class="card-style settings-card-1 mb-30">
                <div
                  class="
                    title
                    mb-30
                    d-flex
                    justify-content-between
                    align-items-center
                  "
                >
                  <h6>Información basica</h6>
                  <button class="border-0 bg-transparent">
                    <i class="lni lni-pencil-alt"></i>
                  </button>
                </div>
                <div class="profile-info">
                  <div class="d-flex align-items-center mb-30">
                    <div class="profile-image">
                      <img src="assets/images/profile/<?php echo $users->img;?>" alt="" />
                      <div class="update-image">
                        <input type="file" />
                        <label for=""
                          ><i class="lni lni-cloud-upload"></i
                        ></label>
                      </div>
                    </div>
                    <div class="profile-meta">
                      <h5 class="text-bold text-dark mb-10"><?php echo $users->name;?></h5>
                      <p class="text-sm text-gray"><?php echo $users->email;?></p>
                    </div>
                  </div>
                  <form action="#">
                    <div class="row">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Full Name</label>
                            <input type="text" placeholder="Full Name" />
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Email</label>
                            <input type="email" placeholder="Email" />
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Address</label>
                            <input type="text" placeholder="Address" />
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="input-style-1">
                            <label>City</label>
                            <input type="text" placeholder="City" />
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="input-style-1">
                            <label>Zip Code</label>
                            <input type="text" placeholder="Zip Code" />
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="select-style-1">
                            <label>Country</label>
                            <div class="select-position">
                            <select class="light-bg">
                                <option value="">Select category</option>
                                <option value="">USA</option>
                                <option value="">UK</option>
                                <option value="">Canada</option>
                                <option value="">India</option>
                                <option value="">Bangladesh</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>About Me</label>
                            <textarea placeholder="Type here" rows="6"></textarea>
                        </div>
                        </div>
                        <div class="col-12">
                        <button class="main-btn primary-btn btn-hover">
                            Update Profile
                        </button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
            @if(Auth::user()->hasRole('empresa'))
            <div class="col-lg-6">
              <div class="card-style settings-card-2 mb-30">
                <div class="title mb-30">
                  <h6>Información de la empresa</h6>
                </div>
                <?php if( $emp == null ) { ?>
                    <form method="POST" action="{{route('empresa.store')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Nombre Comercial</label>
                            <input type="text" id="NomComercial" name="NomComercial" require/>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Nombre Comercial</label>
                            <input type="text" id="NomFiscal" name="NomFiscal" />
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Rfc</label>
                            <input type="text" id="Rfc" name="Rfc"/>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Telefono</label>
                            <input type="text" id="Telefono" name="Telefono" />
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Dirección</label>
                            <input type="text" id="Direccion" name="Direccion" />
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="input-style-1">
                            <label>Ciudad</label>
                            <input type="text" id="Ciudad" name="Ciudad"/>
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="input-style-1">
                            <label>Codigo Postal</label>
                            <input type="text" id="CodigoPostal" name="CodigoPostal" />
                        </div>
                        </div>
                        <div class="col-xxl-4">
                        <div class="select-style-1">
                            <label>Pais</label>
                            <div class="select-position">
                            <select class="light-bg" id="Pais" name="Pais">
                                <option value="">seleccione pais</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                                <option value="Canada">Canada</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="input-style-1">
                            <label>Correo</label>
                            <input type="text" id="Correo" name="Correo" value="<?php echo $users->email; ?>" />
                        </div>
                        </div>
                        <div class="col-12">   
                            <button type="submit" class="main-btn primary-btn btn-hover">Registrar</button>
                        </div>
                    </div>
                    </form>
                        <?php }else{ ?>
                            <?php foreach ($empresa as $em ){ ?>
                            <form method="POST" action="{{ route('empresa.update',$em->id) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Nombre Comercial</label>
                                    <input type="text" id="NomComercial" name="NomComercial" value="{{$em->NomComercial}}" require/>
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Nombre Comercial</label>
                                    <input type="text" id="NomFiscal" name="NomFiscal" value="{{$em->NomFiscal}}" />
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Rfc</label>
                                    <input type="text" id="Rfc" name="Rfc" value="{{$em->Rfc}}" />
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Telefono</label>
                                    <input type="text" id="Telefono" name="Telefono" value="{{$em->Telefono}}" />
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Dirección</label>
                                    <input type="text" id="Direccion" name="Direccion" value="{{$em->Direccion}}" />
                                </div>
                                </div>
                                <div class="col-xxl-4">
                                <div class="input-style-1">
                                    <label>Ciudad</label>
                                    <input type="text" id="Ciudad" name="Ciudad" value="{{$em->Ciudad}}" />
                                </div>
                                </div>
                                <div class="col-xxl-4">
                                <div class="input-style-1">
                                    <label>Codigo Postal</label>
                                    <input type="text" id="CodigoPostal" name="CodigoPostal" value="{{$em->CodigoPostal}}" />
                                </div>
                                </div>
                                <div class="col-xxl-4">
                                <div class="select-style-1">
                                    <label>Pais</label>
                                    <div class="select-position">
                                    <select class="light-bg" id="Pais" name="Pais" value="{{$em->Pais}}">
                                        <option value="{{$em->Pais}}">{{$em->Pais}}</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="input-style-1">
                                    <label>Correo</label>
                                    <input type="text" id="Correo" name="Correo" value="{{$em->Correo}}" />
                                </div>
                                </div>
                                <div class="col-12">   
                                    <button type="submit" class="main-btn primary-btn btn-hover">Actualizar</button>
                                </div>
                            </div>
                    </form>
                <?php } }?>
              </div>
            @else 
                <div class="col-lg-6"></div>
            @endif
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
    
</div>
@endsection