<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" href="css/w3.css">
<script>
  function validaCosto()
  {
    
    km=document.frmServicio.kmRecorridos.value;
    tipo=document.frmServicio.tipo.value; 

    if (km!="")
    {
      if (tipo=="A")
        ct=parseFloat(km)*12.75;
      if (tipo=="B")
        ct=parseFloat(km)*13.97;
      if (tipo=="C")
        ct=parseFloat(km)*15.90;
      if (tipo=="D")
        ct=parseFloat(km)*21.92;
      document.frmServicio.costo.value=ct;

    }



  }
</script>

</head>
<body>  
<?php
$query=require '../bootstrap/bootstrap.php';
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $rfc=$_POST["rfc"];
  $direccion=$_POST["direccion"];
  $nombre =$_POST["nombre"];
  $telefono = $_POST["telefono"];

 if (!empty($_POST["telefono"]) and !empty($_POST["nombre"])) 
{

  $id_cliente= $query->insertDB("INSERT INTO cliente (RFC, nombre, direccion, telefono) VALUES ('$rfc', '$nombre', '$direccion', '$telefono')");
}

}
 
?>

<div class="w3-container w3-blue-grey">
<h2>Datos del servicio</h2>
</div>
<h5>Número de cliente: <?= $id_cliente; ?>
<p><span class="error">* Datos obligatorios.</span></p>
<form method="POST" action="insertaServicio.php" class="w3-container" name="frmServicio">  
  <input type="hidden" value="<?= $id_cliente; ?>" name="id_cliente" id="id_cliente">
  Fecha: <input type="date" class="w3-input" required name="fecha" value="<?php echo date("d/m/Y");?>">
 
  Hora: <input type="text" class="w3-input" placeholder="h:m" required name="hora" value="<?php date_default_timezone_set("America/Mexico_City");echo date("h:i")?>">
  Descripción: <textarea class="w3-input" name="descripcion" placeholder="Describa el evento" required rows="5" cols="40"></textarea>
  Origen: <input class="w3-input" type="text" name="origen" placeholder="En dónde inicia el servicio" required >
  Destino: <input class="w3-input" type="text" name="destino" placeholder="En dónde termina el servicio" required>
  Autoriza: <input class="w3-input" type="text" name="autoriza" placeholder="Nombre de quien autoriza" required>
  Kilómetros recorridos: <input class="w3-input" type="text" name="kmRecorridos" placeholder="Total de kilómetros que se recorrieron" >
  
  Operador: <select class="w3-input" name="licencia" id="licencia" required>
  <option disabled="true" value="0" selected="true">Seleccione el operador que va al evento</option>
<?php
    
    $operadores= $query->selectAll("operador");
    foreach ($operadores as $operador): ?>
    <option value="<?=  $operador->licencia; ?>"><?=  $operador->nombre; ?></option>
  <?php endforeach; ?>
  </select>
  
  Grua: <select class="w3-input" name="id_grua" id="id_grua" required onchange ="validaCosto();">
  <option disabled="true" value="0" selected="true">Seleccione la grua</option>
  <?php
    $gruas= $query->selectAll("grua");
    foreach ($gruas as $grua):   ?>
    <option value="<?=  $grua->id_grua; ?>"><?=  $grua->modelo; ?></option>
    <input type="hidden" name="tipo" id="tipo" value="<?=  $grua->tipo; ?>">
    <?php endforeach; ?>
</select>


    Costo total: <input class="w3-input" type="text" name="costo" id="costo" >

 <br>
  <input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Completar">  
</form>
</body>
</html>