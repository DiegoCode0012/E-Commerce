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
		$por_pagina=5;
		if(isset($_GET['pagina'])){
			$pagina=$_GET['pagina'];
		}else{
			$pagina=1;
		}
	?>

<div class="flexHijo2">

	<h1>Relación de Categoria</h1>
		<div>
		<a class="btn btn-primary" href="agregar.php">Agregar</a>
	</div>
	<table class="table" style="margin-top: 40px;">
		<thead>
		<tr>

			<th>Código</th>
			<th>Descripcion</th>
			<th>Foto</th>
			<th>Eliminar</th>
			<th>Modificar</th>
		</tr>
		</thead>
		<?php
			$empieza=($pagina-1)*$por_pagina;
			$resultado=listarCategoriaPaginacion($conn,$empieza,$por_pagina);
			foreach ($resultado as $key => $value) {
		?>	
			<tbody>
			<tr>
				<td><?=$value[0]?></td>
				<td><?=$value[1]?></td>
				<td><img class="TablaImg" src="../../images/categorias/<?=$value[2]?>"></td>
				<td><a  class="btn btn-danger" href="../../llamadas/procesoCategoria.php?accion=eliminar&codigo=<?=$value[0]?>">Eliminar</a></td>
				<td><a class="btn btn-success" href="modificar.php?codigo=<?=$value[0]?>">Modificar</a></td>
			</tr>
		</tbody>
		<?php	
			}
		?>
		
		
	</table>
		<?php 
    	$query="select * from categoria";
		$resultado=mysqli_query($conn,$query);
		$total_registros=mysqli_num_rows($resultado);
		$total_paginas=ceil($total_registros/$por_pagina);
		echo "<center><a class='enlacePaginacion' href='?pagina=1'>".'Anterior'."</a>";
		for ($i=1; $i<=$total_paginas; $i++) { 
		echo "<a class='enlacePaginacion' href='?pagina=".$i."'>".$i."</a>";
		}
		echo "<a class='enlacePaginacion' href='?pagina=total_paginas'>".'Ultimo'."</a></center>";

		?>
</div>
</body>
</html>