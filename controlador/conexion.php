<?php
function conectar() {
    $conn= mysqli_connect("localhost:3310","root","","bateria"); 
    if(!$conn){
        die("No puede conectarse ".mysqli_error());
    }
    else{
        //echo "Conexión satisfactoria";
    }
    return $conn; 
}
/*CONSULTAS VARIADAS */

function listarProductoSegunCategoriaMarca($conn,$idCat,$idMarca){
  $sql = "select * FROM bateria b
  inner join marca m on m.id=b.id_marca
  inner join categoria c on c.id_categoria=b.id_cat
  WHERE b.id_marca='$idMarca' && b.id_cat='$idCat'";

    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


function listarProductoSegunCategoriaMarcaXPaginacion($conn,$idCat,$idMarca,$empieza,$por_pagina){
  $sql = "select * FROM bateria b
  inner join marca m on m.id=b.id_marca
  inner join categoria c on c.id_categoria=b.id_cat
  WHERE b.id_marca='$idMarca' && b.id_cat='$idCat'
  LIMIT $empieza,$por_pagina
  ";

    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function listarProductoXCategoria($conn,$idcat){
       $sql="select b.id_bat,b.descripcion,b.precio,b.img,b.id_marca,b.id_cat from categoria c 
       inner join bateria b on c.id_categoria=b.id_cat 
       WHERE b.id_cat='$idcat'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


function listarXCategoriaXMarca($conn,$idcat){
       $sql="select * from categoria c 
       inner join categoria_marca cm on c.id_categoria=cm.id_cat
       inner join marca m on m.id=cm.id_marca 
       WHERE c.id_categoria='$idcat'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}



function listarProductoSegunMarca($conn,$idMarca){
    $sql="select * from bateria where idMarca='$idMarca'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


//BATERIA CRUD

function listarBateria($conn){
    $sql="select * from bateria";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

//PAGINACION
function listarBateriaPaginacion($conn, $empieza, $por_pagina) {
    // Corregir la consulta SQL
    $sql = "SELECT * FROM bateria b 
            INNER JOIN categoria c ON c.id_categoria = b.id_cat 
            INNER JOIN marca m ON m.id = b.id_marca 
            LIMIT $empieza, $por_pagina";
    
    $res = mysqli_query($conn, $sql);
    
    // Verificar si la consulta fue exitosa
    if (!$res) {
        die('Error en la consulta: ' . mysqli_error($conn));
    }

    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $vec[] = $f;
    }
    
    return $vec;
}

function agregarBateria($conn,$des,$prec,$stock,$img,$id_marca,$id_cat) {
    $sql = "INSERT INTO bateria (descripcion,precio,stock,img,id_marca,id_cat) 
    VALUES ('$des','$prec','$stock','$img','$id_marca','$id_cat')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function buscarBateria($conn,$cod){
    $sql="select  id_bat, descripcion,precio,stock,img,id_marca,id_cat from bateria where id_bat='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}

function eliminarBateria($conn,$cod){
    $sql="delete from bateria where id_bat='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarBateria($conn,$cod,$des,$prec,$stock,$img,$id_marca,$id_cat){
    $sql="update bateria set descripcion='$des', precio='$prec',stock=$stock,img='$fot',id_marca='$id_marca',id_cat=$id_cat where id_bat='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//CATEGORIA CRUD
function listarCategoria($conn){
    $sql="select id_categoria, descripcion,img from categoria";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function listarCategoriaPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from categoria LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}




function agregarCategoria($conn, $des, $fot) {
    $sql = "INSERT INTO categoria (descripcion,img) VALUES ('$des','$fot')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
function buscarCategoria($conn,$cod){
    $sql="select  id_categoria, descripcion,img from categoria where id_categoria='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}

function eliminarCategoria($conn,$cod){
    $sql="delete from categoria where id_categoria='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarCategoria($conn,$cod,$des,$fot){
    $sql="update categoria set descripcion='$des', img='$fot' where id_categoria='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}




//MARCA CRUD


function listarMarca($conn){
    $sql="select * from marca";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function listarMarcaPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from marca LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function agregarMarca($conn, $des) {
    $sql = "INSERT INTO marca (marca) VALUES ('$des')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function buscarMarca($conn,$cod){
    $sql="select  id, marca from marca where id='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}
function eliminarMarca($conn,$cod){
    $sql="delete from marca where id='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarMarca($conn,$cod,$des){
    $sql="update marca set marca='$des' where id='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

/* CRUD USER*/
function agregarUser($conn, $user,$pass,$nombre,$apel,$dni,$id_rol) {
    $sql = "INSERT INTO usuario (user,password,nombre,apellido,dni,id_rol) 
    VALUES ('$user','$pass','$nombre','$apel','$dni','$id_rol')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function validarUsuario($usu, $pas, $conn) {
    $sql = "SELECT * FROM usuario u 
            INNER JOIN rol r ON r.id_rol = u.id_rol 
            WHERE user = ? AND password = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $usu, $pas);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    $vec = array();
    if (mysqli_num_rows($res) > 0) {
        $vec = mysqli_fetch_array($res);
    }
    mysqli_stmt_close($stmt); // Cierra la declaración
    return $vec;   
}

//PEDIDOS

function ListarPedido($conn){
    $sql="select * from pedido";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function listarPedidoPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from pedido LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function agregarPedido($conn, $trans,$fecha,$status,$id_cliente,$monto,$igv) {
    $sql = "INSERT INTO pedido (id_transaccion,fecha, status, id_cliente, monto, igv) VALUES (?, ?, ?, ?, ?, ?)";

    // Crear una declaración preparada
    $stmt = mysqli_prepare($conn, $sql);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssssdd", $trans, $fecha, $status, $id_cliente, $monto, $igv);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Verificar si hubo algún error
    if (mysqli_stmt_error($stmt)) {
        die("Error en la consulta en PEDIDO: " . mysqli_stmt_error($stmt));
    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}

function agregarDetalle($conn, $id_producto, $cantidad, $pedidoID) {
    // Preparar la consulta
    $sql = "INSERT INTO detalle_pedido (id_producto, cantidad, id_pedido) VALUES (?, ?, ?)";
    
    // Crear una declaración preparada
    $stmt = mysqli_prepare($conn, $sql);
    
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "iii", $id_producto, $cantidad, $pedidoID);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Verificar si hubo algún error
    if (mysqli_stmt_error($stmt)) {
        die("Error en la consulta EN DETALLE: " . mysqli_stmt_error($stmt));
    }
    
    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}


function ultimo($conn,$transaccion){
    $sql="SELECT * from pedido p WHERE p.id_transaccion='$transaccion'";
   $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 

}
//relacionamos un pedido con sus detalles y cada detalle tiene relacionado a un solo producto
function VerPedido($conn,$transaccion){
    $sql="select * from pedido p 
    inner join detalle_pedido de on de.id_pedido=p.id_pedido 
    inner join bateria b on b.id_bat=de.id_producto 
    WHERE p.id_transaccion='$transaccion'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function VerPedido2($conn,$id){
    $sql="select * from pedido p 
    inner join detalle_pedido de on de.id_pedido=p.id_pedido 
    inner join bateria b on b.id_bat=de.id_producto 
    WHERE p.id_pedido='$id'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}


function VerPedido3NoPag($conn, $id_pedido, $id_cliente) {
    $sql = "SELECT * FROM pedido p 
            INNER JOIN detalle_pedido de ON de.id_pedido = p.id_pedido 
            INNER JOIN bateria b ON b.id_bat = de.id_producto 
            INNER JOIN usuario u ON u.id_user = p.id_cliente
            WHERE p.id_pedido = ? AND p.id_cliente = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param('ii', $id_pedido, $id_cliente);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $res = $stmt->get_result();
    $vec = array();

    while ($f = $res->fetch_assoc()) {
        $vec[] = $f;
    }

    // Cerrar la declaración
    $stmt->close();

    return $vec;
}
function VerPedido3Pag($conn, $id_pedido, $id_cliente,$empieza,$por_pagina) {
    $sql = "SELECT * FROM pedido p 
            INNER JOIN detalle_pedido de ON de.id_pedido = p.id_pedido 
            INNER JOIN bateria b ON b.id_bat = de.id_producto 
            INNER JOIN usuario u ON u.id_user = p.id_cliente
            WHERE p.id_pedido = ? AND p.id_cliente = ?
            LIMIT $empieza,$por_pagina";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param('ii', $id_pedido, $id_cliente);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $res = $stmt->get_result();
    $vec = array();

    while ($f = $res->fetch_assoc()) {
        $vec[] = $f;
    }

    // Cerrar la declaración
    $stmt->close();

    return $vec;
}

function listarPedidosXUsuario($conn,$idUser){
      $sql="select * from pedido p 
      inner join usuario u on u.id_user=p.id_cliente
    WHERE p.id_cliente='$idUser'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}



function eliminarPedido($conn,$cod){
    $sql="delete from pedido where id_pedido='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
function listarUsuarioPaginacion($conn,$empieza,$por_pagina){
$sql = "SELECT * FROM usuario u 
        INNER JOIN rol r ON u.id_rol = r.id_rol 
        WHERE r.descripcion = 'user' 
        LIMIT $empieza, $por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function ProductosMasVendidos($conn){
$sql = "SELECT b.descripcion AS producto, SUM(dp.cantidad) AS total_vendido FROM bateria.detalle_pedido dp JOIN bateria.pedido pe ON dp.id_pedido = pe.id_pedido JOIN bateria.bateria b ON dp.id_producto = b.id_bat GROUP BY b.id_bat";  
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


function TotalVentas($conn){
$sql = "SELECT SUM(pe.monto) AS Monto FROM bateria.pedido pe";  
  $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}


function CategoriasMasRentables($conn){
$sql = "SELECT c.id_categoria,c.descripcion, pe.monto AS rentabilidad_total FROM pedido pe JOIN detalle_pedido dp ON dp.id_pedido = pe.id_pedido JOIN bateria b ON dp.id_producto = b.id_bat JOIN categoria c ON c.id_categoria = b.id_cat GROUP BY c.descripcion"; 
 $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function UsuariosMasFrecuentes($conn){
$sql = "SELECT u.user, COUNT(pe.id_pedido) AS compra_contador FROM usuario u 
JOIN pedido pe ON u.id_user = pe.id_cliente WHERE u.id_rol = 2 GROUP BY u.id_user"; 
 $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

?>


