<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Agencia de Viajes</title>
  
</head>
<body>

	<?php
		include 'includes/cabecera.php';

	?>
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
        <img src="images/carrusel1.png" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/todos.png" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<div class="categorias-flex">
  <div class="itemCategoria">
    <a href="#"><img src="images/categorias/automovil.jpg"></a>
    <div>
      <h1>Automovil</h1>
   <p style="font-size:20px"> Brindamos Baterías para todo tipo de Automóviles con un arranque fiable y seguro para cualquier motor diesel o gasolina, para todo-terreno, 4x4, Furgones, camionetas, etc.</p>
    </div>
  </div>
  <div class="itemCategoria">
    <a href="#"><img src="images/categorias/camion.jpg"></a>
    <div>
       <h1>Camiones</h1>
      <p style="font-size:20px">Baterías con mayor fuerza de arranque, especialmente para camiones, autobuses, maquinaria pesada, maquinaria agrícola, Camiones de Minería, Generadores, etc.</p>
    </div>
  </div>
  <div class="itemCategoria">
  <a href="#"><img src="images/categorias/moto.jpg"></a>
    <div>
       <h1>Motos</h1>
     <p style="font-size:20px">Las mejores baterías de arranque fiable y seguro para Motos, motocicletas, Quads, motos acuáticas, pequeños tractores, máquinas corta césped, así como cualquier pequeño motor de gasolina.</p>
    </div>
  </div>
  <div class="itemCategoria">
   <a href="#"><img src="images/categorias/mq.jpg"></a>
    <div>
       <h1>Maquinaria</h1>
    <p style="font-size:20px"> La mayor variedad de baterías para equipamiento de maquinaria pesada y vehículos eléctricos. Carretillas y plataformas elevadoras, grúas telescópicas.</p>


    </div>
  </div>
  <div class="itemCategoria">
  <a href="#"><img src="images/categorias/acuaticas.jpg"></a>
    <div>
      <h1>Acuaticas</h1>
     <p style="font-size:20px">Contamos con baterías de ciclo profundo para vehículos marinos, que cubren múltiples tipos de aplicaciones. Están diseñadas para su uso en equipamiento náutico .</p>


    </div>
  </div>
  <div class="itemCategoria">
   <a href="#"><img src="images/categorias/estacionarias.jpg"></a>
    <div>
      <h1>Estacionarias</h1>
     <p style="font-size:20px">Ofrecemos un completo rango de capacidades y configuraciones. Este tipo de baterías proporciona seguridad total, en cualquier sistema de alimentación interrumpida (SAI-UPS)</p>


    </div>
  </div>

</div>

<div class="marcas-flex">
  <div>
 <a href="#"><img src="images/marcas/Bosch.jpg"></a>
 </div>
<div>
<a href="#"><img src="images/marcas/capsa.jpg"></a>
 </div>
 <div>
  <a href="#"><img src="images/marcas/etna.png"></a>
  </div>
  <div>
 <a href="#"><img src="images/marcas/yuasa.jpg"></a>
</div>

</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<?php
		include 'includes/footer.php';
	?>

</body>
</html>


