<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../../css/tabla.css">
	<title></title> 
</head>
<body>

	<?php
		include '../../includes/cabecera3.php';
		require("../../controlador/conexion.php");

		if(!isset($_SESSION['usuario']['usuario'])){// isset prueba si existe la variable usuario si no exista devuelve
			header("location:../logueo.php");
}else{
		$conn = conectar();
		$arreglo=listarPedidosXUsuario($conn,$_SESSION['usuario']['id']);
		
}
	?>

<?php 
if(count($arreglo)>0){
?>
<div style="display: flex; flex-direction: column; flex-wrap: wrap; justify-content: center; align-items: center;margin-top: 40px;">
<div><p style="font-size:20px;font-weight: bold;"><?=$arreglo[0]['user']?></p></div>
<div><p style="font-size:20px;font-weight: bold;"><?=$arreglo[0]['nombre']?> <?=$arreglo[0]['apellido']?></p></div>
<div><h1 style="color:#dc3545">Relación de pedidos</h1></div>
</div>

	<table class="tablaUsuario">
		<thead>
		<tr>
			<th>Código</th>
			<th>Transacción</th>
			<th>Fecha</th>
			<th>Status</th>
			<th>Monto</th>
			<th>IGV</th>
			<th>Detalle</th>
		</tr>
		</thead>
		<?php
			foreach ($arreglo as $key => $value) {
		?>	
			<tr>
				<td><?=$value["id_pedido"]?></td>
				<td><?=$value["id_transaccion"]?></td>
				<td><?=$value[1]?></td>
				<td><?=$value[2]?></td>
				<td><?=$value[5]?></td>
				<td><?=$value['igv']?></td>
				<td><a style="background: #198754; border-radius:60px;padding: 10px; text-decoration: none;color:white" href="verDetalle.php?id=<?=$value[0]?>">Ver</a>
			</tr>
		<?php	
			}
		?>
		
		
	</table>
	</div>
<?php 
}else
{
?>
<div style="display:flex;justify-content: center;flex-wrap: wrap;align-items: center;">
	<div style="color:white;background: #dc3545;border-color: ##dc3545;padding: 15px;border-radius: 5px;margin: 15px;">
		No hay pedidos realizados por <?=$_SESSION['usuario']['usuario'] ?>
	</div>
	<div style="flex-basis: 100%;text-align: center;">
		<img style="width:150px" src="../../images/alerta.png">
	</div>
</div>
<?php 
}
?>
</script>

      
</body>
</html>