<?php  
  	require 'config/config.php';
  	$producto = new producto();
  	$productos = $producto->listarUltimosTres();
  	include 'includes/header.html';  
	include 'includes/nav.php'; 
?>


<main role="main">

	<hr>


	<div class="container marketing">
		<div class="card bg-dark ">
			<img src="imagenes/sweet.jpg" class="img-fluid" alt="portada">
				<div class="card-img-overlay">
					<h5 class="indie " style=" text-align: left; margin-left: 0px; padding-left: 0px:"><mark style="opacity: 70%">Bienvenido <span id="spicy">a SpicyCakes</span></mark></h5>
				</div>
		</div>

	<hr>


	<div class="row">

<!-- SHOWS LAST 3 PRODUCTS  -->

<?php
		foreach ( $productos as $producto ):
?>
		<div class="col-md-4">
			<div class="card mb-4 shadow-sm">

			
				<span><i class="fas fa-award fa-4x" style="; position: absolute; padding: 10px; color: white; transform: rotate(-20deg);"></i></span>

				<img src="imagenes/<?= $producto['prdImagen'] ?>" class="card-img-top img-thumbnail">
					<div class="card-body">
					<h4 class="font-italic text-center"><?= $producto['prdNombre'] ?></h4>
	<hr>
					<p class="font-weight-normal text-center">
						<?= $producto['catNombre'] ?> <br>
						$<?= $producto['prdPrecio'] ?>
					</p>
						<div class="d-flex justify-content-between align-items-center">
							<a class="btn-sm btn btn-outline-success" href="https://api.whatsapp.com/send/?phone=541165955694&text=Hola%2C+me+gustar%C3%ADa+hacerte+un+encargo+de+<?= $producto['prdNombre'] ?>.&app_absent=0" target="_blank" role= "button"><i class="fab fa-whatsapp"></i> Encargar
							</a>
							<a class="btn-sm btn btn-outline-secondary" href="detalles.php?idProducto=<?= $producto['idProducto'] ?>" role= "button"><i class="fas fa-info"></i> Ver detalles
							</a>	
							<a class="btn-sm btn btn-outline-info" href="detalles.php?idProducto=<?= $producto['idProducto'] ?>" role= "button"><i class="far fa-envelope"></i> Encargar
							</a>
						</div>
					</div>
			</div>
	</div>
<?php
endforeach;
?>

<!-- SHOWS CATEGORIES -->

<?php 
        foreach ($categorias as $categoria):
?>   

	<hr>

		<div class="row featurette">	 
			<div class="col-md-7 <?= $categoria['posicionNombre']?> col align-self-center">
				<h2 class="featurette-heading  text-dark"><?= $categoria['catNombre'] ?>
					<span class="text-muted"> <?= $categoria['catSub'] ?></span>
				</h2>
					<p class="lead" ><?= $categoria['catDescripcion'] ?></p>
						<a class="btn-sm btn btn-outline-secondary" role= "button" href="categoriaIndv.php?idCategoria=<?= $categoria['idCategoria'] ?>"><i class="fas fa-info"></i> Ver categoria
						</a>
			</div>
				<div class="col-md-5">
                <div class="div-img hidden " >
                <a  href="categoriaIndv.php?idCategoria=<?= $categoria['idCategoria'] ?>">
                    <img  class="img img-thumbnail" src="imagenes/<?= $categoria['catImagen'] ?>">
                    </a>
                </div>
                </div>
		</div>

<?php 
endforeach;
?>
	<hr>



<!-- SHOWS WAYS OF RETIREMENT -->
	<div class="row">
		<div class="col-lg-4">
			<i class="fas fa-box-open fa-3x"></i>
			<i class="fas fa-shipping-fast fa-3x"></i>
			<i class="fas fa-hand-holding-heart fa-3x"></i>
				<h2>Envios sin cargo</h2>
					<p>Queres envio sin cargo? Chequea el mapa y si estas dentro podes disfrutar nuestras delicias, sin costo de envio</p>
					<p><a class="btn btn-secondary" href="envios.php" role="button">Ver detalles &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<i class="fas fa-boxes fa-3x"></i>
			<i class="fas fa-shipping-fast fa-3x"></i>
			<i class="fas fa-hand-holding-heart fa-3x"></i>
				<h2>Envios Programados</h2>
					<p>Queres armar un pedido especial de cumpleaños, aniversario?? Lo podemos programar, consultanos!!</p>
					<p><a class="btn btn-secondary" href="envios.php	" role="button">Ver detalles &raquo;</a></p>
		</div>
		<div class="col-lg-4">
			<i class="fas fa-handshake fa-3x"></i>
			<i class="fas fa-shipping-fast fa-3x"></i>
			<i class="fas fa-hand-holding-heart fa-3x"></i>
				<h2>Coordinacion de retiro</h2>
					<p>Sos de esas personas que preferis retirarlo por tu cuenta? No hay problema, coordinamos dia y horario y lo pasas a retirar!</p>
					<p><a class="btn btn-secondary" href="envios.php" role="button">Ver detalles &raquo;</a></p>
		</div><!-- /.col-lg-4 -->
	</div><!-- /.row -->
</div><!-- /.container -->
	<hr>
</main>



<?php  
	include 'includes/footer.php';  
?>