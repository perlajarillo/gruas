<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente=$_POST["id_cliente"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $descripcion = $_POST["descripcion"];
    $origen = $_POST["origen"];
    $destino = $_POST["destino"];
    $autoriza = $_POST["autoriza"];
    $licencia = $_POST["licencia"];
    $id_grua = $_POST["id_grua"];
    $kmRecorridos = $_POST["kmRecorridos"];
    $costo = $_POST["costo"];
  
    if (!empty($_POST["fecha"]) and !empty($_POST["hora"]) and !empty($_POST["descripcion"])and !empty($_POST["origen"])and !empty($_POST["destino"])and !empty($_POST["autoriza"])) 
    {
      $query=require '../bootstrap/bootstrap.php';

      $id_servicio= $query->insertDB("INSERT INTO servicio (fecha, hora, descripcion, origen, destino, autoriza, id_cliente) VALUES ('$fecha', '$hora', '$descripcion', '$origen', '$destino', '$autoriza', '$id_cliente')");

      $id_detalle=$query->insertDB("INSERT INTO detalle_servicio (km_recorridos, costoTotal, licencia, id_grua, id_servicio) VALUES ('$kmRecorridos', '$costo', '$licencia', '$id_grua', '$id_servicio')");
    }

      echo "Se ha insertado el servicio, ahora puede dar seguimiento en la sección de servicios";

}


?>