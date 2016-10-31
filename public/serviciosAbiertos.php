<?php 
//if (!class_exists ('Connection'))
$query=require '../bootstrap/bootstrap.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//$query=require '../bootstrap/bootstrap.php';
	//$query=$_POST["query"];
    $id_detalle=$_POST["id_detalle"];
    $km_recorridos=$_POST["km"];
    $costoTotal=$_POST["costo"];

   $result= $query->updateDB("UPDATE detalle_servicio SET km_recorridos='$km_recorridos', costoTotal='$costoTotal' WHERE id_detalle='$id_detalle'");
}
   ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Gruas Jarillo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../public/css/w3.css">
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>

<script>
        function goPopup(id_detalle, clienteN, clienteTel, fecha, hora, origen, destino, placas, operadorN, operadorTel, k, c) {

            document.getElementById("costo").value = c.toString();
            document.getElementById("km").value = k.toString();
            document.getElementById("id_detalle").value = id_detalle;
            document.getElementById("cliente").value = clienteN;
            document.getElementById("telefonoCliente").value = clienteTel;
            document.getElementById("fecha").value = fecha;
            document.getElementById("hora").value = hora;
            document.getElementById("origen").value = origen;
            document.getElementById("destino").value = destino;
            document.getElementById("placas").value = placas;
            document.getElementById("operadorN").value = operadorN;
            document.getElementById("operadorTel").value = operadorTel;   
        }

</script>
<body>
<div id="services" class="w3-container">
  <div class="container">
    <h3 class="text-center">SERVICIOS EN CURSO</h3>
   <table>
   <tr>
        <th>Número</th>
        <th>Cliente</th>
        <th>Teléfono del cliente</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Origen</th>
        <th>Destino</th>
    <!--     <th>Grua asignada</th>
        <th>Operador de la grúa</th>
        <th>Teléfono del operador</th>
        <th>Km. Recorridos</th>
        <th>Costo del servicio</th> -->
   </tr>
   <?php
    if (isset($query)){
    $servicios= $query->selectSpecific("SELECT id_detalle, servicio.id_servicio, cliente.nombre as clienteN, cliente.telefono as clienteTel, fecha, hora, origen, destino, placas, operador.nombre as operadorN, operador.telefono as operadorTel, km_recorridos, costoTotal FROM cliente, operador, servicio, grua, detalle_servicio WHERE cliente.id_cliente=servicio.id_cliente AND operador.licencia=detalle_servicio.licencia AND servicio.id_servicio=detalle_servicio.id_servicio AND grua.id_grua=detalle_servicio.id_grua");
    
  foreach ($servicios as $servicio): ?> 
   <tr>
        <td><?=  $servicio->id_servicio; ?></td>
        <td><?=  $servicio->clienteN; ?></td>
        <td><?=  $servicio->clienteTel; ?></td>
        <td><?=  $servicio->fecha; ?></td>
        <td><?=  $servicio->hora; ?></td>
        <td><?=  $servicio->origen; ?></td>
        <td><?=  $servicio->destino; ?></td>
 
        <td><button onclick="goPopup('<?=  $servicio->id_detalle; ?>', '<?=  $servicio->clienteN; ?>', '<?=  $servicio->clienteTel; ?>', '<?=  $servicio->fecha; ?>', '<?=  $servicio->hora; ?>', '<?=  $servicio->origen; ?>', '<?=  $servicio->destino; ?>', '<?=  $servicio->placas; ?>', '<?=  $servicio->operadorN; ?>', '<?=  $servicio->operadorTel; ?>', '<?=  $servicio->km_recorridos; ?>', '<?=  $servicio->costoTotal; ?>');" data-target="#myModal" data-toggle="modal">Ver detalles</button></td>
   </tr>
  <?php endforeach; }?>
    </table>
    
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Detalles del servicio</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="serviciosAbiertos.php" method="post" name="frmUpdate" id="frmUpdate">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-user"></span> Cliente</label>
              <input type="text" class="form-control" id="cliente" name="cliente" disabled="true">
            </div>
            <div class="form-group">
              <label for="telefonoCliente">Teléfono del cliente</label>
              <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" disabled="true">
            </div>
            <div class="form-group">
              <label for="fecha">Fecha de servicio</label>
              <input type="text" class="form-control" id="fecha" name="fecha" disabled="true">
            </div>
            <div class="form-group">
              <label for="hora">Hora de servicio</label>
              <input type="text" class="form-control" id="hora" name="hora" disabled="true">
            </div>
            <div class="form-group">
              <label for="origen"> Origen</label>
              <input type="text" class="form-control" id="origen" name="origen" disabled="true">
            </div>
            <div class="form-group">
              <label for="destino">Destino</label>
              <input type="text" class="form-control" id="destino" name="destino" disabled="true">
            </div>
            <div class="form-group">
              <label for="placas">Placas de la grúa</label>
              <input type="text" class="form-control" id="placas" name="placas" disabled="true">
            </div>
            <div class="form-group">
              <label for="operadorN">Nombre del operador de la grúa</label>
              <input type="text" class="form-control" id="operadorN" name="operadorN" disabled="true">
            </div>
              <div class="form-group">
              <label for="km">Kilómetros recorridos</label>
              <input type="text" class="form-control" id="km" name="km">
            </div>
            <div class="form-group">
              <label for="costo">Costo total</label>
              <input type="text" class="form-control" id="costo" name="costo">
            </div>
            
            <input type="hidden" name="id_detalle" id="id_detalle">
           
              <button type="submit" class="btn btn-block">Guardar cambios
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          
        </div>
      </div>
    </div>
  </div>
</div>

</body>