<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTA_CLIENTES</title>
    <link rel="stylesheet" href="../../css/bootstrap.css" />

</head>
<body>

    <style>
        * {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

    </style>
        <!-- ========== informacion de los clentes ========== -->
  <div class="container-fluid ">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <h6 class="mb-10">Tabla de clientes</h6>
          <p class="text-sm mb-20">
            En esta tabla se muestra la informacion de los clientes con los que cuenta la empresa
          </p>
          <div class="">
            <table class=" table content-table">
              <thead>
                <tr>
                  <th><h6>#</h6></th>
                  <th><h6>NoCliente</h6></th>
                  <th><h6>Nombre</h6></th>
                  <th><h6>Fecha Inicio</h6></th>
                  <th><h6>Fecha Fin</h6></th>
                  <th><h6>Dirección</h6></th>
                  <th><h6>Telefono</h6></th>
                  <th><h6>Pago</h6></th>
                </tr>
              </thead>
                <tbody>
                    <?php foreach ($ci as $key=>$c) { ?>
                          <tr class="active-row">
                            <td class="min-width">
                            <p><?php echo $key+1; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->NoCliente; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->Nombre." ".$c->ApPaterno." ".$c->ApMaterno; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->FechaInicio; ?></p>
                            </td>
                            <td class="min-width">
                              <p><?php echo $c->FechaFin; ?></p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $c->Direccion; ?> </p>
                            </td>
                            <td class="min-width">
                                <p><?php echo $c->Telefono; ?></p>
                            </td>
                            <td class="min-width">
                                <h4>
                                <?php foreach ($pl as $key=>$p) { 
                                    if($p->id == $c->plan_id){
                                        echo "$ ".$p->precio." MXN";
                                    }
                                } ?>
                                </h4>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>