<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $posicion = new posicion();
    $posiciones = $posicion->listarPosicion();

	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Modificación de una categoría</h1>


                <div class="alert alert-secondary p-8 col-8 mx-auto">
                <form action="modificarCategoria.php" method="post" enctype="multipart/form-data">
<?php  
  $categoria = new categoria();
  $categorias = $categoria->verCategoriaPorID();
?>
                <div class="form-group">
                    <label for="catNombre">Categoría:</label>
                    <input type="text" name="catNombre"
                           value="<?= $categoria->getCatNombre() ?>"
                           class="form-control" id="catNombre" required>
                </div>
                <div class="form-group">
                <label for="catSub">Subtitulo de categoria</label>
                        <input type="text" name="catSub"
                           value="<?= $categoria->getCatSub() ?>"
                           class="form-control" id="catSub" required>
                </div>

                <div class="form-group">
                
                </div>

                <div class="form-group">
                    <label for="idPosicion">Posicion</label>
                    <select class="form-control" name="idPosicion" id="idPosicion" required>
        <option value="<?= $categoria->getIdPosicion()?>">Modificar la posicion</option>
<?php
            foreach ( $posiciones as $posicion ){
?>                        
                        <option value="<?= $posicion['idPosicion'] ?>"><?= $posicion['posicion'] ?></option>
<?php
            }
?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="catDescripcion">Descripcion de la Categoria</label>
                    <textarea name="catDescripcion" class="form-control" id="catDescripcion" 
                              required><?= $categoria->getCatDescripcion() ?></textarea>
                </div>


                <div class="form-group">
                    <label for="catImagen">Imagen de la Categoria:
                        <br>
                        <img src="imagenes/<?= $categoria->getCatImagen() ?>" class="img-thumbnail">
                    </label>
                    <input type="file" name="catImagen" class="form-control-file" id="catImagen">
                </div>

                <input type="hidden" name="catImagenOriginal"
                       value="<?= $categoria->getCatImagen() ?>">
                
                <input type="hidden" name="idCategoria"
                       value="<?= $categoria->getIdCategoria() ?>">
                
                <button class="btn btn-dark mr-3 px-4">Modificar Categoria</button>
                <a href="adminCategorias.php" class="btn btn-outline-secondary">
                    Volver a panel de categorias
                </a>

            </form>
        </div>













    </main>

<?php  include 'includes/footer.php';  ?>