<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

		<?php
		session_start();
			
		include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		$conn = conectar();
			if(isset($_REQUEST['codigo'])){
				$cod = $_REQUEST['codigo'];
				$marca=buscarMarca($conn,$cod);
			}else
				header("location:listar.php");
			
	?>


<div class="flexHijo2">
	<h1 style="color:green">Formulario Editar Marca</h1>
	<form class="container" action="../../llamadas/procesoMarca.php">	
	<input type="hidden" name="codigo" value="<?=$marca[0]?>">
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" value="<?=$marca[1]?>"
	placeholder="Ingrese la marca">
	</div>
		<div class="cajaForm">
			<input class="inputForm" type="hidden" name="accion" value="agregar">
		</div>
		<input  type="hidden" name="accion" value="modificar">
	<div  class="cajaForm">
		<input class="btn btn-success" type="submit" name="editar" value="Editar">
	</div>	
</form>
	</div>


</body>
</html>