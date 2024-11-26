<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php
		session_start();
			
		include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		$conn = conectar();

	?>


<div class="flexHijo2">
	<h1 style="color:red">Formulario Agregar Categoría</h1>
	<form class="container" action="../../llamadas/procesoCategoria.php" method="post" enctype="multipart/form-data">	
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" placeholder="Ingrese la categoría">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="file" name="foto">
	</div>
	<input  type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="btn btn-primary" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>
	
</body>
</html>