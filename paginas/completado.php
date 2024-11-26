<!DOCTYPE html>
<html>
<head>
	<title></title>
			<link rel="stylesheet" type="text/css" href="../css/tabla.css">

</head>
<body>
<?php
		require("../controlador/conexion.php");
		$conn = conectar();
		$id_transacion=isset($_GET['key'])? $_GET['key']:'';
		if ($id_transacion =='') {
		  header("Location: ../index.php");
		}else{
			$consultaVerPedido=VerPedido($conn,$id_transacion);
			        include "../includes/cabecera2.php";
		}
	?>

<div style="display: flex;justify-content: center;flex-direction: column;align-items: center; margin-top: 20px;">
<h1 style="color:red">Gracias por  su pago</h1>
<img src="../images/completado.png">

<p style="font-size:20px">Folio de la Compra: <?=$id_transacion?></p><br>
<p style="font-size:20px">Fecha de la TRANSACCION: <?=$consultaVerPedido[0]['fecha']?></p><br>
<p style="font-size:20px">IGV S/<?=$consultaVerPedido[0]['igv']?></p><br>
<p style="font-size:20px">Total S/<?=$consultaVerPedido[0]['monto']?></p><br>

</div>
<table class="table">
	<thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
	</thead>

<?php foreach($consultaVerPedido as $key => $value) {
 $Importe=$value['cantidad']*$value['precio'];
?>
	<tr>
		<td><?=$value['descripcion']?></td>
		<td><?=$value['precio']?></td>
		<td><?=$value['cantidad']?></td>
		<td><?=$Importe?></td>
	</tr>
<?php 
}
?>
</table>
<script type="text/javascript">
    localStorage.removeItem("cart");
</script>
</body>
</html>