<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>

	<div style="display:flex; align-items: center;flex-wrap: wrap; margin:20px">
	<div class="contImagen"><img style="width:100%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6Eglcm0huxUgwOUQ683cx_NF-9nffwsPyOA&s"></div>
	<form class="formulario" action="../llamadas/procesoLogueo.php" method=" post">
			<h1 style="color: #dc3545;">Login</h1>
		<div class="cajaForm">
			<input class="inputForm" type="text" name="usuario" placeholder="Nombre">
		</div>
		<div class="cajaForm">
			<input class="inputForm" type="password" name="pass" placeholder="Password">
		</div>
		<div style="margin: 10px;">
			<div class="cajaInformativa">
				<input class="botonLogin" type="submit" name="enviar" value="Logueo">
			</div>

			<div class="cajaInformativa">
				<a class="back" href="prueba.php">Volver</a>
			</div>
			<div class="cajaInformativa">
				<a class="registro" href="registro.php">Registrarse</a>
			</div>
		</div>
	</form>
	</div>
</body>
</html>