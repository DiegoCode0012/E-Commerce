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
	<h1 style="color:red">Formulario Agregar Producto</h1>
	<form class="container" action="../../llamadas/procesoProducto.php" method="post" enctype="multipart/form-data">	
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" placeholder="Ingrese nombre de la batería">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="text" name="precio" placeholder="Ingrese el precio">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="text" name="stock" placeholder="Ingrese el stock">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="file" name="foto" placeholder="Ingrese foto">
	</div>
	<div class="cajaForm">
		<select name="marca" class="form-select w-25" style="margin:auto">
		<?php
			foreach (listarMarca($conn) as $key => $valor) {
		?>	
			<option value="<?=$valor[0]?>"><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
	<div class="cajaForm" >
		<select name="categoria" class="form-select w-25" style="margin:auto">
		<?php
			foreach (listarCategoria($conn) as $key => $valor) {
		?>	
			<option value="<?=$valor[0]?>"><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
<input type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="botonAgregar" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>

	
</body>
</html>