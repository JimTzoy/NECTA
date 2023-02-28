<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Cuenta de empleado</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
    
            </div>
            <div class="col-md-6" style="text-align: center;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Información del de la cuenta del empleado
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Correo</p>
                                <p>{{$v}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>Contraseña</p>
                                <p>{{$f}}</p>
                            </div>
                        </div>
                        <br>
                        <p>Al salir de esta ventana ya no podra consultar esta información porfavor guardela y compartala con su empleado</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('empleados.index') }}" class="btn btn-primary ">Salir</a>
                    </div>
                    
                    
                    
                </div>
            </div>
            <div class="col-md-3">
    
            </div>
        </div>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>