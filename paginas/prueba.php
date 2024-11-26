<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/prueba.css">

</head>
<body>  

   
    <?php
        require "../controlador/conexion.php";
        include "../includes/cabecera2.php";
        $conn = conectar();
        $por_pagina=7;
          if(isset($_GET['pagina'])){
           $pagina=$_GET['pagina'];
          }else{
            $pagina=1;
         }
?>

<!-- <a href="#" onclick="demi()">BORRAME</a> -->
<div class="CartEnlace">
<a  href="carro.php"><img src="../images/carroCompra.png">
    </a>
</div>
<div class="contenedor">
    <div class="CategoriasItem">
            <div class="enlaceTodos">
                <a style="text-decoration: none;color: red;font-weight: bold;  font: oblique bold 150% cursive;" href="?filtro=todos">TODOS</a>
            </div>
        <?php
                foreach (listarCategoria($conn) as $key => $value1) {       
            ?>
            <div class="accordion" value="<?=$value1[0]?>">
                <b style="text-align: left;  text-transform: capitalize; font: oblique bold 120% cursive;"><?=$value1[1]?></b>
                <img style="text-align: right;" width="20px;height=20px" src="https://cdn-icons-png.flaticon.com/512/32/32320.png">
            </div>
          
                <div class="panel">
                    <?php
                    foreach (listarXCategoriaXMarca($conn,$value1[0]) as $key => $value){
                    ?>
                  <form action="prueba.php" method="get">
                    <input type="hidden" name="idCat" value="<?=$value["id_cat"]?>">
                    <input type="hidden" name="idMarca" value="<?=$value["id_marca"]?>">
                    <input class="botonDinamico"  type="submit" name="submit" value="<?=$value["marca"]?>">
                  </form>   
                    <?php
                }

                    ?>
            </div>
        
            <?php
            
                }
            
            ?>
            </div>


<?php 
        $empieza=($pagina-1)*$por_pagina;
        if(isset($_REQUEST['idCat']) && isset($_REQUEST['idMarca'])){
        $id_cat = $_REQUEST['idCat'];
        $id_marca = $_REQUEST['idMarca'];
        $vector=listarProductoSegunCategoriaMarcaXPaginacion($conn,$id_cat,$id_marca,$empieza,$por_pagina);
    }else{
         $vector=listarBateriaPaginacion($conn,$empieza,$por_pagina); 
    }
?>
            <div class="flex-container">
       <!--       <img  style="width: 70%;height: 250px; padding: 15px;text-align: center;object-fit: contain;" src="../images/categorias/<?=$vector[0][11]?>">-->
                <?php
            foreach ($vector as $key => $value) {
             
        ?>  
            <div class="item" id="<?=$value[0]?>"> <!-- id-->
                <img src="../images/<?=$value[4]?>">
                <h3 style="margin: 6px 0;"><?=$value[1]?></h3><!-- description-->
                <p  style="color: red;font-size: 20px;font-weight: bold; margin:6px 0">S/<?=$value[2]?></p> <!-- price-->
               <input type="hidden" name="stock" value="<?=$value[3]?>">
               <p style="margin:6px 0; font-size: 18px;">Stock:<?=$value[3]?></p>
               <button  class="agregarPr">Agregar</button>
                <div class="esconder" data-id="esconder<?=$value[0]?>">
                    <i class="menos fa-solid fa-minus"></i>
                    <p></p>
                    <i  class="more fa-solid fa-plus"></i>
                </div> 
            </div>
        <?php   
            }
        ?>
 
            </div>


    </div>


<?php 
    $tamañoArreglo=count($vector);
    $total_paginas=ceil($tamañoArreglo/$por_pagina);

    if(isset($id_cat) && isset($id_marca)){
       $vector=listarProductoSegunCategoriaMarca($conn,$id_cat,$id_marca);
       $tamañoArreglo=count($vector); 
       $total_paginas=ceil($tamañoArreglo/$por_pagina);

       echo '<center><a class="enlacePaginacion" href="?idCat='.$id_cat.'&idMarca='.$id_marca.'&pagina=1">
    Anterior
    </a>';
          for ($i=1; $i<=$total_paginas; $i++) { 
        echo '<a class="enlacePaginacion" href="?idCat='.$id_cat.'&idMarca='.$id_marca.'&pagina='.$i.'">
        '.$i.'
         </a>'; 
            }
echo "<a class='enlacePaginacion' href='?idCat=$id_cat&idMarca=$id_marca&pagina=$total_paginas'>Último</a>";
    }else{
       $vector=listarBateria($conn);
       $tamañoArreglo=count($vector);
       $total_paginas=ceil($tamañoArreglo/$por_pagina);

          echo "<center><a class='enlacePaginacion' href='?pagina=1'>".'Anterior'."</a>";
          for ($i=1; $i<=$total_paginas; $i++) { 
           echo "<a class='enlacePaginacion' href='?pagina=".$i."'>".$i."</a>";
          }
             echo "<a class='enlacePaginacion' href='?pagina=".$total_paginas."'>".'Ultimo'."</a>";
    }

    ?>
<script>    
    if(!localStorage.getItem('cart')){
        localStorage.setItem('cart', JSON.stringify([]));
    }
window.addEventListener("DOMContentLoaded", () => {
    const carts = JSON.parse(localStorage.getItem('cart')) || [];
    carts.forEach(producto => {
        const padreItem = document.getElementById(producto.id); // Encuentra el div por ID
        if (padreItem) {
            const botonAgregar = padreItem.querySelector('button');
            botonAgregar.classList.remove('agregarPr');
            botonAgregar.classList.add('esconder');

            const divControles = padreItem.querySelector('div');
            divControles.classList.remove('esconder');
            divControles.classList.add('mostrar');

            // Actualiza los íconos y la cantidad
            const iconos = divControles.querySelectorAll('i');
            iconos[0].className = producto.quantity > 1 ? 'menos fa-solid fa-minus':'menos fa-solid fa-trash';
            divControles.querySelector('p').innerHTML = producto.quantity +"un";
        }
    });
});

    var agregarPr=document.getElementsByClassName("agregarPr");
Array.from(agregarPr).forEach(x=>{
    x.addEventListener("click", ()=> {
        add(x.parentElement);

  });
});
function add(padreItem,btn){
var NuevoProducto= {
           id:parseInt(padreItem.id),
           name:padreItem.querySelector('h3').textContent,
           price:padreItem.querySelector('p').textContent.split("/")[1],
           imagen:padreItem.querySelector('img').src,
           stock:parseInt(padreItem.querySelector('input[type="hidden"]').value),
           quantity:1
};
if (localStorage.getItem('cart')) {
        console.log("sss")
carts=JSON.parse(localStorage.getItem('cart'));
carts.push(NuevoProducto);
addCartToMemory(carts); 
padreItem.querySelector('button').classList.remove('agregarPr');
padreItem.querySelector('button').classList.add('esconder');
padreItem.querySelector('div').classList.add('mostrar');
padreItem.querySelector('div').classList.remove('esconder');
const iconos = padreItem.querySelector('div').querySelectorAll('i');
iconos[0].className = 'menos fa-solid fa-trash'; 
padreItem.querySelector('div').querySelector('p').innerHTML=NuevoProducto.quantity +"un";          
}

    
}


var acc = document.getElementsByClassName("accordion");
var more=document.getElementsByClassName("more");
var menos=document.getElementsByClassName("menos");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");
    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
  //  console.log(panel);

    if (panel.style.display == "flex") {
      panel.style.display = "none";
      Menos=this.querySelector("img");
      Menos.src="https://cdn-icons-png.flaticon.com/512/32/32320.png";
      Menos.style.width="20px";
      Menos.style.height="20px";
    } else {
      panel.style.display = "flex";
       Mas=this.querySelector("img");
       Mas.src="https://cdn-icons-png.flaticon.com/512/109/109615.png";
       Mas.style.width="20px";
       Mas.style.height="20px";
    }
    
  });
}


Array.from(menos).forEach(x=>{
    x.addEventListener("click", ()=> { 
       decrease(x.parentElement.parentElement);

  });   
});

Array.from(more).forEach(x=>{
    x.addEventListener("click", ()=> { 
       AddMore(x.parentElement.parentElement)

  });   
});



function AddMore(padreItem){
var NuevoProducto= {
           id:parseInt(padreItem.id),
           name:padreItem.querySelector('h3').textContent,
           price:padreItem.querySelector('p').textContent.split("/")[1],
           imagen:padreItem.querySelector('img').src,
           stock:parseInt(padreItem.querySelector('input[type="hidden"]').value),
           quantity:1
};
var bandera=false;
if (localStorage.getItem('cart')) {
carts=JSON.parse(localStorage.getItem('cart'));
    carts.forEach(x=>{
        if (x.id==padreItem.id) { //10,10
           var a=validarStock(x);
            if(a){
            x.quantity=parseInt(x.quantity)+1;
                if(x.quantity>1){
                    const iconos = padreItem.querySelector('div').querySelectorAll('i');
                    iconos[0].className = 'menos fa-solid fa-minus'; 
                }
            padreItem.querySelector('div').querySelector('p').innerHTML=x.quantity +"un";          

          }
        }
    })
 addCartToMemory(carts); 
}   
}

function decrease(padreItem){
var bandera=false;
if (localStorage.getItem('cart')) {
carts=JSON.parse(localStorage.getItem('cart'));
    carts.forEach((x,index)=>{
        if (x.id==padreItem.id) {          
           x.quantity=parseInt(x.quantity)-1;
           if(x.quantity==1){
            const iconos = padreItem.querySelector('div').querySelectorAll('i');
            iconos[0].className = 'menos fa-solid fa-trash'; 
           }
           if(x.quantity==0){
                carts = carts.filter(item => item.id !== x.id);
                padreItem.querySelector('button').classList.add('agregarPr');
                padreItem.querySelector('button').classList.remove('esconder');
                padreItem.querySelector('div').classList.remove('mostrar');
                padreItem.querySelector('div').classList.add('esconder');
           }
            padreItem.querySelector('div').querySelector('p').innerHTML=x.quantity +"un";                  
        }
    })
 addCartToMemory(carts); 
}   
}


var validarStock =(x)=>{
  var rpta;
if (x.quantity>=x.stock) {
 return false;
}else{
  return true;
}
}


const addCartToMemory = (carts)=>{
    localStorage.setItem('cart',JSON.stringify(carts));
}
</script>


        <?php
        include '../includes/footer2.php';
    ?>
    </body>
</html>