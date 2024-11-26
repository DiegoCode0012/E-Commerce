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

		if(isset($_SESSION['usuario']['usuario']) && isset($_REQUEST['id'])){
		$conn = conectar();
		$arreglo=VerPedido2($conn,$_REQUEST['id']);
		
}else{
			header("location:../logueo.php");
		
}
	?>

<?php 
if(count($arreglo)>0){
?>
<div class="centrar" style="margin-top: 25px;">
	</div> 
	<table class="tablaUsuario">
		<thead>
		<tr>
			<th colspan="2">Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
		</thead>
		<?php
		$total=0;
			foreach ($arreglo as $key => $value) {
			 $Importe=$value['cantidad']*$value['precio'];
			 $total+=$Importe
		?>	
			<tr>
		<td><img style="width: 45px;height: 45px" src="../../images/<?=$value['img']?>"></td>
		<td><?=$value['descripcion']?></td>
		<td>S/<?=$value['precio']?></td>
		<td><?=$value['cantidad']?></td>
		<td>S/<?=$Importe?></td>
			</tr>
		<?php	
			}
		?>
		
		
	</table>
	<div style="display: flex; text-align: center; flex-wrap: wrap;justify-content: center;flex-direction: column;align-items: center; color: red; margin-bottom: 20px;">
		<p>Fecha:<?=$arreglo[0]['fecha']?></p>
		<b>Total:<?=$total?></b>
	</div>
<?php 
}else
{
?>
<div>No hay pedidos </div>
<?php 
}
?>
<div style="display: flex; justify-content: center;">
	<a style="text-decoration: none;padding: 15px 20px;background: #101c76;color: white;border: none;border-radius: 4px;cursor: pointer; " href="verPedidosPorUsuarios.php">Volver</a>
</div>
</body>
</html>