<?php  

	  require 'config/config.php';
	$categoria = new categoria();
  	$categorias = $categoria->listarCategorias();

	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
    <h1 class="indie display-2">Categorias</h1>
<?php 
            foreach ($categorias as $categoria){
?>   

<hr>

<div class="row featurette " >	 
<div class="col-md-7 <?= $categoria['posicionNombre']?> col align-self-center" >
<h2 class="featurette-heading  text-dark"><?= $categoria['catNombre'] ?><span class="text-muted"> <?= $categoria['catSub'] ?></span></h2>
<p class="lead" ><?= $categoria['catDescripcion'] ?></p>
</div>
<div class="col-md-5">
<img src="imagenes/<?= $categoria['catImagen'] ?>" class="img-thumbnail">
</div>
</div>

<?php 
}
?>
<hr>
















    </main>





<?php  include 'includes/footer.php';  ?>