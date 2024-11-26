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
			if(isset($_REQUEST['id_pedido']) && isset($_REQUEST['id_cliente'])){
					$por_pagina=6;
				if(isset($_GET['pagina'])){
					$pagina=$_GET['pagina'];
				}else{
					$pagina=1;
				}
			$empieza=($pagina-1)*$por_pagina;	
			$conn = conectar();
			$pedido=$_REQUEST['id_pedido'];
			$cliente=$_REQUEST['id_cliente'];
			$arreglo=VerPedido3Pag($conn,$pedido,$cliente,$empieza,$por_pagina);
			}else{
				header("location:../sadas.php");
			}
	
	?>
<script>

</script>

<div class="flexHijo2">

	<div class="row">
  <div class="col-sm-6">
    <div class="card">
    	 <div class="card-header text-success">Datos del Usuario</div>
      <div class="card-body">
      	 <ul class="list-group list-group-flush">
	    <li class="list-group-item"><b>User:</b><span><?=$arreglo[0]['user']?></li>
	    <li class="list-group-item"><b>Nombres:</b><span><?=$arreglo[0]['nombre']?> <?=$arreglo[0]['apellido']?></span></li>
	    <li class="list-group-item"><b>Dni:</b><span><?=$arreglo[0]['dni']?></span></li>
  </ul>

      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
    	 <div class="card-header text-success">Datos del Pedido</div>
      <div class="card-body">
      	 <ul class="list-group list-group-flush">
	    <li class="list-group-item"><b>Transacción:</b><span><?=$arreglo[0]['id_transaccion']?></span></li>
	    <li class="list-group-item"><b>Fecha:</b><span><?=$arreglo[0]['fecha']?></span></li>
	    <li class="list-group-item"><b>Monto:</b><span><?=$arreglo[0]['monto']?></span></li>
  </ul>

      </div>
    </div>
  </div>
</div>

		<div style="margin-top: 40px;">
		<h1  style="color: green">Datos de Productos</h1>
		</div>
	<table class="table">
		<thead>
		<tr>
			<th colspan="2">Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
		</thead>
		<?php
			foreach ($arreglo as $key => $value) {
			 $Importe=$value['cantidad']*$value['precio'];
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
		<?php 
    	$query="SELECT * FROM pedido p 
            INNER JOIN detalle_pedido de ON de.id_pedido = p.id_pedido 
            INNER JOIN bateria b ON b.id_bat = de.id_producto 
            INNER JOIN usuario u ON u.id_user = p.id_cliente
            WHERE p.id_pedido = $pedido AND p.id_cliente = $cliente";
		$resultado=mysqli_query($conn,$query);
		$total_registros=mysqli_num_rows($resultado);
		$total_paginas=ceil($total_registros/$por_pagina);
		echo "<center><a class='enlacePaginacion' href='?&id_pedido=$pedido&id_cliente=$cliente&pagina=1'>Anterior</a>";
    
    for ($i = 1; $i <= $total_paginas; $i++) { 
        echo "<a class='enlacePaginacion' href='?id_pedido=$pedido&id_cliente=$cliente&pagina=$i'>$i</a>";
    }
    
    echo "<a class='enlacePaginacion' href='?id_pedido=$pedido&id_cliente=$cliente&pagina=$total_paginas'>Ultimo</a></center>";

		?>
</div>

</body>
</html>