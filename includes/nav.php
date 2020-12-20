
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<span >MENU</span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
<a class="nav-link" href="about.php">Sobre</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link " href="categoria.php" id="navbarDropdownMenuLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Categorias
</a>
<div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">

<?php  
  $categoria = new categoria();
  $categorias = $categoria->listarCategorias();

            foreach ( $categorias as $categoria ):
?>   


<a class="dropdown-item bg-dark text-white" href="categoriaIndv.php?idCategoria=<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></a>




<?php 
endforeach;
?>


</div>
</li>
<li class="nav-item">
<a class="nav-link" href="envios.php">Envios</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contacto.php">Contacto</a>
</li>

</ul>
</div>





<?php
// si está logueado
if ( isset( $_SESSION['login'] ) ){
?>

<li class="navbar-nav dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Administrar sistema
</a>
<div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item bg-dark text-white" href="adminProductos.php">Administrar Productos</a>
<a class="dropdown-item bg-dark text-white" href="adminUsuarios.php">Administrar Usuarios</a>
<a class="dropdown-item bg-dark text-white" href="adminCategorias.php">Administrar Categorias</a>
</div>
</li>

<li class="navbar-nav dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt"></i>
<?= $_SESSION['datosUsuario'] ?>
</a>




<div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item bg-dark text-white" href="logout.php">Salir de sistema</a>
<a class="dropdown-item bg-dark text-white" href="formModificarPerfil.php?idUsuario=<?= $_SESSION['idUsuario'] ?>">Modificar Perfil</a>
<a class="dropdown-item bg-dark text-white" href="formCambiarPassword.php?idUsuario=<?= $_SESSION['idUsuario'] ?>">Cambiar contraseña</a>
</div>
<?php
}
else{ 
// si no está logueado
?>





<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="formLogin.php"><i class="fas fa-sign-in-alt mr-2"></i> Ingresar</a>
</li>
</ul>

<?php
}
?>


</div>


</nav>

