<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


		<script src="https://kit.fontawesome.com/efe3882b3d.js" crossorigin="anonymous"></script>
</head>

	<?php 
if (!isset($_SESSION['admin']["admin"]) || $_SESSION['admin']['rol'] != "admin") {
  header("location:prueba.php");
}
?>
<div class="panelAdmin">
		<div class="logo">
			<div>
			<img src="../../images/logoEmpresa.jpg">
			</div>
		</div>
		<h4 class="user">Usuario: <?= $_SESSION['admin']['admin']?></h4>
						<h4 class="user">Rol: <?= $_SESSION['admin']['rol']?></h4>

	<ul class="principal">
			<li><a  href="marca/listar.php"><i class="fa-solid fa-list"></i><span>Marcas</span></a></li>
			<li><a  href="categoria/listar.php"><i class="fa-solid fa-layer-group"></i><span>Categorías</span></a></li>
			<li><a  href="producto/listar.php"><i class="fa-solid fa-shop"></i><span>Baterias</span></a></li>
			<li><a href="pedidos/listar.php"><i class="fa-solid fa-truck"></i><span>Pedidos</span></a></li>
			<li><a href="clientes/listar.php"><i class="fa-solid fa-user-plus"></i><span>Usuarios</span></li>
								<li><a href="../resumen/listar.php"><i class="fa-solid fa-table-list"></i><span>Resumen</span></li>
			<li><a  href="../llamadas/procesoCerrarSesion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar sesión</a></li>
	</ul>
</div>
</html>