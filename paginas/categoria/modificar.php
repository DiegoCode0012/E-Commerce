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
			if(isset($_REQUEST['codigo'])){
				$cod = $_REQUEST['codigo'];
				$cat=buscarCategoria($conn,$cod);
			}else
				header("location:listar.php");
			
	?>


<div class="flexHijo2">
	<h1 style="color:green">Formulario Editar Categoría</h1>
	<form class="container" action="../../llamadas/procesoCategoria.php" method="post" enctype="multipart/form-data">	
		<input type="hidden" name="codigo"  value="<?=$cat[0]?>">
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" placeholder="Ingrese la categoría" value="<?=$cat[1]?>">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="file" name="foto" value="<?=$cat[2]?>">
	</div>
		<input type="hidden" name="accion" value="modificar"><br>
	<div  class="cajaForm">
		<input class="btn btn-success" type="submit" name="editar" value="Modificar">
	</div>	
</form>
	</div>
	

</body>
</html>