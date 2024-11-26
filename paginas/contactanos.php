<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/contactanos.css">
	<title></title>
</head>
<body>
<?php
		require("../controlador/conexion.php");
		$conn = conectar();
		include '../includes/cabecera2.php';
	?>

<div style="margin-top: 15px;">
<h1>Encuentranos</h1>
</div>
<div class="contenedorPadreContactanos">
  <div class="contenedorContacto">
    <div>
      <h1>Lima</h1><br>
        <p style="font-family: initial; font-size: 20px;">Av. Canadá 996-A, La Victoria - Lima</p><br>
    <p style="font-size:20px">Teléfono: (01) 480-0419 / Celular: 987-974-913</p><br>
    <div>
    <img src="https://www.todobaterias.pe/images/map-lima.jpg">
    </div>
    </div>
  </div>
<form class="formularioSimple">
  <div>
    <h1>DEJANOS UN MENSAJE</h1>
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Nombres">
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Telefono">
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Email">
  </div>
  <div>
  <textarea  class="inputText" placeholder="Mensaje"></textarea>
  </div>
  <div>
    <input  class="btnEnviar" type="submit" name="Enviar">
  </div>
</form>
</div>
   <?php
		
		include '../includes/footer2.php';
	?>
</body>
</html>