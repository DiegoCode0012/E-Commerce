<?php
require("../controlador/conexion.php");
$conn = conectar();

$action = $_REQUEST['accion'];

if ($action == "agregar") {
    $des = $_REQUEST['descripcion'];
    $pre = $_REQUEST['precio'];        
    $sto = $_REQUEST['stock'];
    $marca = $_REQUEST['marca'];
    $cat = $_REQUEST['categoria'];
    $fot = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = '../images/' . $fot;

    if (!empty($fot)) {
        copy($ruta, $destino);
    }

    agregarBateria($conn, $des, $pre, $sto, $fot, $marca, $cat);
} elseif ($action == "eliminar") {
    $cod = $_REQUEST['codigo'];
    eliminarBateria($conn, $cod);
} elseif ($action == "modificar") {
    $cod = $_REQUEST['codigo'];
    $des = $_REQUEST['descripcion'];
    $pre = $_REQUEST['precio'];        
    $sto = $_REQUEST['stock'];
    $marca = $_REQUEST['marca'];
    $cat = $_REQUEST['categoria'];

    $fot = $_FILES['foto']['name'];
    $ruta = $_FILES['foto']['tmp_name'];
    $destino = '../images/' . $fot;

    // Verifica si se seleccionó una nueva imagen
    if (!empty($fot) && !empty($ruta)) {
        copy($ruta, $destino); // Si hay una nueva imagen, se copia
    } else {
        // Si no, usa la imagen existente
        $bateria = buscarBateria($conn, $cod);
        $fot = $bateria[4]; // Asegúrate de que `buscarBateria` devuelve la imagen actual en la posición correcta
    }

    actualizarBateria($conn, $cod, $des, $pre, $sto, $fot, $marca, $cat);
}

header("location:../paginas/producto/listar.php");
?>
