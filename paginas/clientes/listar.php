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

	<h1>Relación de Clientes</h1>
	<table class="table" style="margin-top: 40px;">
		<thead>
		<tr>

			<th>User</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>DNI</th>
		</tr>
		</thead>
		<?php
			$empieza=($pagina-1)*$por_pagina;
			$resultado=listarUsuarioPaginacion($conn,$empieza,$por_pagina);
			foreach ($resultado as $key => $value) {
		?>	
			<tbody>
			<tr>
				<td><?=$value["user"]?></td>
				<td><?=$value["nombre"]?></td>
				<td><?=$value["apellido"]?></td>
				<td><?=$value["dni"]?></td>
			</tr>
		</tbody>
		<?php	
			}
		?>
		
		
	</table>
		<?php 
  		$query = "SELECT * FROM usuario u 
              INNER JOIN rol r ON r.id_rol = u.id_rol 
              WHERE r.descripcion = 'user'";
        $resultado=mysqli_query($conn,$query);
		$total_registros=mysqli_num_rows($resultado);
		$total_paginas=ceil($total_registros/$por_pagina);
		echo "<center><a class='enlacePaginacion' href='?pagina=1'>".'Anterior'."</a>";
		for ($i=1; $i<=$total_paginas; $i++) { 
		echo "<a class='enlacePaginacion' href='?pagina=".$i."'>".$i."</a>";
		}
		echo "<a class='enlacePaginacion' href='?pagina=".$total_paginas."'>".'Ultimo'."</a></center>";

		?>
</div>
</body>
</html>