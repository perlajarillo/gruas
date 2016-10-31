  <!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link rel="stylesheet" href="css/w3.css">
</head>
<body>  

<div class="w3-container w3-blue-grey">
<h2>Datos del cliente</h2>
</div>
<p><span class="error">* Datos obligatorios.</span></p>
<form method="post" action="servicio.php" class="w3-container">  
 <span class="error">*</span> Nombre: <input class="w3-input" type="text" name="nombre" placeholder="Nombre del cliente" required="true"> 
    

  RFC: <input class="w3-input" type="text" name="rfc" placeholder="PPMNAAMMDD000">

  Dirección: <textarea class="w3-input" name="direccion" rows="5" cols="40" placeholder="Dirección del cliente"></textarea>

  <span class="error">*</span>Teléfono: <input class="w3-input" type="text" name="telefono" placeholder="Número telefónico del cliente" required="true">
  
  <input class="w3-btn w3-blue-grey" type="submit" name="submit" value="Siguiente">  
</form>
</body>
</html>