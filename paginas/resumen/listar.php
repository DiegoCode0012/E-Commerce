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
		$valor=TotalVentas($conn);
		$categoriasMas=CategoriasMasRentables($conn);
		$UserMasFrecuentes=UsuariosMasFrecuentes($conn);
	?>
<div class="flexHijo2">
	<div style="text-align:left;">
	<h4 style="color:blue">Total Venta</h4>
	<p>S/<?=$valor[0]?></p>
	<h4 style="color:blue">Categorías mas rentables</h4>
		<ul>
		<?php
		foreach ($categoriasMas as $key => $value) { 
		?>
		<li><b> <?=$value['descripcion']?>:</b> S/<?=$value['rentabilidad_total']?></li>
		<?php 
			}
		?>
		</ul>
			<h4 style="color:blue">Usuarios con mas compras</h4>
			<ul>
		<?php
		foreach ($UserMasFrecuentes as $key => $value) { 
		?>
		<li><b> <?=$value['user']?>:</b> <?=$value['compra_contador']?> veces</li>
		<?php 
			}
		?>
		</ul>
	</div>
	<h2>Productos mas Vendidos</h2>
	<table class="table" style="margin-top: 40px;">
		<thead>
		<tr>
			<th>Producto</th>
			<th>Total_Vendido</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$resultado=ProductosMasVendidos($conn);
			foreach ($resultado as $key => $value) {
		?>
				<tr>
					<td><?=$value["producto"]?></td>
					<td><?=$value["total_vendido"]?>un</td>
				</tr>
		<?php	
			}
		?>
		</tbody>
	</table>
</div>

</body>
</html>