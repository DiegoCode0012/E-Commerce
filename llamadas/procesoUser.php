<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$action = $_REQUEST['accion'];

	if($action=="agregar"){
		$user = $_REQUEST['user'];
		$password = $_REQUEST['password'];
		$nombre = $_REQUEST['nombre'];
		$apellido = $_REQUEST['apellido'];		
		$dni = $_REQUEST['dni'];
		$id_rol = 2;
		agregarUser($conn,$user,$password,$nombre,$apellido,$dni,$id_rol);
	}

	header("location:../paginas/prueba.php");

?>
