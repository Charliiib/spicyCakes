<?php  
//	include 'includes/header.html';  
//	include 'includes/nav.php';  

	  require 'config/config.php';
	$categoria = new categoria();
  	$categorias = $categoria->listarCategorias();
var_dump($categoria);
?>

    <main class="container">
        <h1>Tema de la página</h1>


<?php 
 
            foreach ($categorias as $categoria){
?>   


	<div style="display: flex;">  
	 	<h2><?= $categoria['idCategoria'] ?> </h2> 
	 	<h3><?= $categoria['idPosicion'] ?> </h3>
	 	<h1><?= $categoria['catNombre'] ?> </h1>
 	<h2><?= $categoria['posicionNombre'] ?> </h2> 
	</div>





<?php 
}


 ?>	




    </main>

<?php  // include 'includes/footer.php';  ?>