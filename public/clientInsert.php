<?php

$nombre=$_POST['nombre'];
$RFC=$_POST['rfc'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];

$query=require '../bootstrap/bootstrap.php';

$last_id= $query->insertDB("INSERT INTO cliente (RFC, nombre, direccion, telefono) VALUES ('$nombre', '$RFC', '$direccion', '$telefono')");


require "servicio.php";

?>