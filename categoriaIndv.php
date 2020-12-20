<?php  
  require 'config/config.php';
  $producto = new producto();
  $productos = $producto->listarPrdPorCategorias();
	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
 
<?php  
  $categoria = new categoria();
  $categorias = $categoria->verCategoriaPorID();
?>

    	 <h5 class="indie display-2"><?= $categoria->getCatNombre() ?></h5>

      


<hr>







<div class="row">
<?php

foreach ( $productos as $producto ){

?>


<div class="col-md-4">
<div class="card mb-4 shadow-sm">
<img src="imagenes/<?= $producto['prdImagen'] ?>" class="card-img-top img-thumbnail">
<div class="card-body">


<h4 class="font-italic text-center"><?= $producto['prdNombre'] ?></h4>
<p class="font-weight-normal ">

$<?= $producto['prdPrecio'] ?><br>
<?= $producto['prdDescripcion'] ?>
</p>

<div class="d-flex justify-content-between align-items-center">

<a class="btn-sm btn btn-outline-success" href="https://api.whatsapp.com/send/?phone=541165955694&text=Hola%2C+me+gustar%C3%ADa+hacerte+un+encargo+de+<?= $producto['prdNombre'] ?>.&app_absent=0" target="_blank" role= "button"><i class="fab fa-whatsapp"></i> Encargar</a>


<a class="btn-sm btn btn-outline-secondary" href="detalles.php?idProducto=<?= $producto['idProducto'] ?>" role= "button">
<i class="fas fa-info"></i> Ver detalles</a>


<a class="btn-sm btn btn-outline-info" href="detalles.php?idProducto=<?= $producto['idProducto'] ?>" role= "button">
<i class="far fa-envelope"></i>Encargar</a>

</div>
</div>
</div>

</div>


<?php
}
?>








    </main>

<?php  include 'includes/footer.php';  ?>