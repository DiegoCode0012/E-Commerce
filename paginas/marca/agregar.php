<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<?php
		session_start();
			
		include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		$conn = conectar();

	?>

<div class="flexHijo2">
	<h1 style="color:red">Formulario Agregar Marca</h1>
	<form class="container" action="../../llamadas/procesoMarca.php">	
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" placeholder="Ingrese la marca">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="hidden" name="accion" value="agregar">
	</div>
	<input  type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="btn btn-primary" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>
</body>
</html>




