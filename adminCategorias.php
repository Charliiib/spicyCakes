<?php

    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();

	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Panel de administración de Categorias</h1>

        <a href="admin.php" class="btn btn-outline-secondary my-3">
            Volver a principal
        </a>

        <table class="table table-border table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Subtitulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <a href="formAgregarCategoria.php" class="btn btn-dark">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach ($categorias as $categoria){
?>            
                <tr>
                    <td><?= $categoria['idCategoria'] ?></td>
                    <td><?= $categoria['catNombre'] ?></td>
                    <td><?= $categoria['catSub'] ?></td>
                    <td><?= $categoria['catDescripcion'] ?></td>
                     <td><img src="imagenes/<?= $categoria['catImagen'] ?>" class="img-thumbnail"></td>
                    <td>
                        <a href="formModificarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarCategoria.php?idCategoria=<?= $categoria['idCategoria'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
<?php
            }
?>            
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary my-3">
            Volver a principal
        </a>

    </main>

<?php  include 'includes/footer.php';  ?>