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
				$bat=buscarBateria($conn,$cod);
			}

	?>


	<div class="flexHijo2">
	<h1 style="color:green">Formulario Editar Baterías</h1>
	<form class="container	" action="../../llamadas/procesoProducto.php" method="post" enctype="multipart/form-data">	
			<input type="hidden" name="codigo" value="<?=$bat[0]?>">
	<div class="cajaForm">
		<input class="form-control w-25" type="text" name="descripcion" placeholder="Ingrese nombre de la batería" value="<?=$bat[1]?>">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="text" name="precio" placeholder="Ingrese el precio" value="<?=$bat[2]?>">
	</div>
	<div class="cajaForm">
			<input class="form-control w-25" type="text" name="stock" placeholder="Ingrese el stock" value="<?=$bat[3]?>">
	</div>
	<div class="cajaForm">
						<input class="form-control w-25" type="file" name="foto" placeholder="Ingrese foto">
	</div>
	<div class="cajaForm">
		<select  name="marca" class="form-select w-25" style="margin:auto;" aria-label="Default select example">
		<?php
			foreach (listarMarca($conn) as $key => $valor) {
			$selected = ($valor[0] == $bat[5]) ? 'selected' : '';
		?>	
			<option value="<?=$valor[0]?>" <?=$selected?> ><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
		<div class="cajaForm">

		<select name="categoria"  class="form-select w-25" style="margin:auto;" aria-label="Default select example">
		<?php
			foreach (listarCategoria($conn) as $key => $valor) {
				$selected = ($valor[0] == $bat[6]) ? 'selected' : '';

		?>	
			<option value="<?=$valor[0]?>" <?=$selected?> ><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
<input type="hidden" name="accion" value="modificar">
	<div  class="cajaForm">
		<input class="botonEditar" type="submit" name="modificar" value="Editar">
	</div>	
</form>
	</div>



</body>
</html>