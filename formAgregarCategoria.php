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
        <h1>Alta de una nueva categoría</h1>

        <div class="alert alert-secondary p-8 col-8 mx-auto">
            <form action="agregarCategoria.php" method="post" enctype="multipart/form-data">
                

                <div class="form-group">
                    <label for="catNombre">Nombre de la Categoria</label>
                    <input type="text" name="catNombre" class="form-control" id="catNombre" required>
                </div>

                 <div class="form-group">
                    <label for="catSub">Subtitulo de la Categoria</label>
                    <input type="text" name="catSub" class="form-control" id="catSub" required>
                </div>

                <div class="form-group">
                    <label for="idPosicion">Vista</label>
                    <select class="form-control" name="idPosicion" id="idPosicion" required>
                        <option value="">Seleccione una Vista</option>
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
                    <textarea name="catDescripcion" class="form-control" id="catDescripcion" required></textarea>
                </div>

                
    
                <div class="form-group">
                    <label for="catImagen">Imagen de la Categorias</label>
                    <input type="file" name="catImagen" class="form-control-file" id="catImagen">
                </div>

                <button class="btn btn-dark mr-3 px-4">Agregar categoria</button>
                <a href="adminProductos.php" class="btn btn-outline-secondary">
                    Volver a panel de categorias
                </a>

           











            </form>
        </div>






    </main>

<?php  include 'includes/footer.php';  ?>