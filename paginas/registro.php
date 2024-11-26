<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>

	<div style="display:flex; align-items: center;flex-wrap: wrap;align-items: center;">
	<div style="flex:1;"><img style="width:100%" src="https://img.freepik.com/vector-gratis/carro-tienda-edificio-tienda-dibujos-animados_138676-2085.jpg?semt=ais_hybrid"></div>
	<form class="formulario" action="../llamadas/procesoUser.php" method=" post" onsubmit="return validarFormulario()">
		<h2 style="color: red">Crear Usuario</h2>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="nombre" placeholder="nombre">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="apellido" placeholder="apellido">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="dni" placeholder="dni">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="user" placeholder="usuario">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="password" name="password" placeholder="password">
		</div>
		<div style="margin: 10px;">
		<div  class="cajaInformativa">
			<input class="registro" type="submit" name="agregar" value="Crear Usuario">
		</div>
		<div  class="cajaInformativa">
			<a class="back" href="logueo.php">Volver</a>
		</div>
					<input type="hidden" name="accion" value="agregar"><br>
		</div>
		<div style="display: flex;justify-content: center;">
		<div id="errorContainer">
		</div>
		</div>
	</form>
	</div>
	
</body>
</html>

<script type="text/javascript">
function validarFormulario() {
    const errors = [];
    const nombre = document.querySelector('input[name="nombre"]').value.trim();
    const apellido = document.querySelector('input[name="apellido"]').value.trim();
    const dni = document.querySelector('input[name="dni"]').value.trim();
    const user = document.querySelector('input[name="user"]').value.trim();
    const password = document.querySelector('input[name="password"]').value.trim();
const soloNumeros = /^[0-9]+$/;
     if (!nombre) {
        errors.push("El nombre no puede estar vacío.");
    } else if (nombre.length < 4) {
        errors.push("El nombre debe tener al menos 4 caracteres.");
    }

    if (!apellido) {
        errors.push("El apellido no puede estar vacío.");
    } else if (apellido.length < 4) {
        errors.push("El apellido debe tener al menos 4 caracteres.");
    }

    if (!dni) {
        errors.push("El DNI no puede estar vacío.");
    } else if (!soloNumeros.test(dni)) {
        errors.push("El DNI solo debe contener números.");
    } else if (dni.length !== 7) {
        errors.push("El DNI debe tener exactamente 7 caracteres.");
    }

    if (!user) {
        errors.push("El usuario no puede estar vacío.");
    } else if (user.length < 4) {
        errors.push("El usuario debe tener al menos 4 caracteres.");
    }

    if (!password) {
        errors.push("La contraseña no puede estar vacía.");
    } else if (password.length < 4) {
        errors.push("La contraseña debe tener al menos 4 caracteres.");
    }

    // Mostrar errores
    const errorContainer = document.getElementById('errorContainer');
    errorContainer.innerHTML = ''; // Limpiar errores previos

    if (errors.length > 0) {
        const ul = document.createElement('ul');
        errors.forEach(error => {
            const li = document.createElement('li');
            li.textContent = error;
            ul.appendChild(li);
        });
        errorContainer.appendChild(ul);
        errorContainer.style.border = '1px solid red';
		errorContainer.style.backgroundColor = '#f8d7da';
        return false; // Evitar el envío del formulario
    }

    return true; // Permitir el envío del formulario
}
</script>

