<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/cabecera.css">
	<script src="https://kit.fontawesome.com/efe3882b3d.js" crossorigin="anonymous"></script>

	<title></title>
</head>
<body>

	<div>
		<div class="head">
		
			<a href="../index.php">Inicio</a>
			<a href="../paginas/prueba.php">Catalogo</a>
			<a href="../paginas/conocenos.php">Conocenos</a>
			<a href="../paginas/contactanos.php">Contactanos</a>
			<?php session_start(); if(!isset($_SESSION['usuario']['usuario']))
			{
				?>
			<a href="../paginas/logueo.php"><img style="width: 50px;border-radius: 30%" src="../images/login.png"></a>
			<?php 
			}else{
			?>
			<a href="#"><?=$_SESSION['usuario']['usuario']?></a>
			<a href="../paginas/pedidos/verPedidosPorUsuarios.php"><i class="fa-solid fa-truck"></i><span>Mis Pedidos</span></a>
						<a href="../llamadas/procesoCerrarSesion.php"><i class="fa-solid fa-right-from-bracket"></i></a>

			<?php 
			}
			?>
	</div>
	<div class="datos">
		<div class="hijo">
			<div> <!-- los divs son para que sean tratados como bloques y al siguiente div, se vaya para abajo y no siga -->
			<b style="color: white;font-size: 24px;vertical-align: middle;">999-041-031</b>
			<a href=""><img style="width: 30px;vertical-align: middle;" src="../images/redes/whatsap.png"></a>
			</div>
			<div>
				<p style="color: white;font-style: italic;">LUNES-SÁBADO:8:00-18:00hs</p>
			</div>
			<div>
			<p style="color: white;font-style: italic;">kallpaAndHaylli@gmail.com</p>		
			</div>
		</div>

		<div class="hijo">
			<img style="width: 180px;height: 130px;border-radius: 50%" class="logoEmpresa" src="../images/logoEmpresa.jpg">
		</div>
		<div class="hijo">
				<a href="https://www.facebook.com/profile.php?id=100064250820067"><img style="width: 50px;" src="../images/redes/facebook3.png"></a>
				<a href="#"><img style="width: 50px;" src="../images/redes/youtube.png"></a>
		</div>

	</div>

</div>
	
    
 
</body>
</html>