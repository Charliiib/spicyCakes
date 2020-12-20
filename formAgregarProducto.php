<?php

    require 'config/config.php';
    $autenticar = new autenticar();
    $autenticarse = $autenticar->autenticar();
    $producto = new producto();
    $productos = $producto->listarProductos();
    $categoria = new categoria();
    $categorias = $categoria->listarCategorias();
	include 'includes/header.html';
	include 'includes/nav.php';  
?>

    <main class="container">

        <h1>Alta de un nuevo producto</h1>

        <div class="alert alert-secondary p-8 col-8 mx-auto">
            <form action="agregarProducto.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="prdNombre">Nombre del Producto</label>
                    <input type="text" name="prdNombre" class="form-control" id="prdNombre" required>
                </div>

                <label for="prdPrecio">Precio del Producto</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio" class="form-control" id="prdPrecio" min="0" step="0.01" required>
                </div>


                <div class="form-group">
                    <label for="idCategoria">Categoría</label>
                    <select class="form-control" name="idCategoria" id="idCategoria" required>
                        <option value="">Seleccione una categoría</option>
<?php
            foreach ( $categorias as $categoria ){
?>                        
                        <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></option>
<?php
            }
?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prdDescripcion">Descripcion del Producto</label>
                    <textarea name="prdDescripcion" class="form-control" id="prdDescripcion" required></textarea>
                </div>


                <div class="form-group">
                    <label for="prdImagen">Imagen del Producto</label>
                    <input type="file" name="prdImagen" class="form-control-file" id="prdImagen">
                </div>

                <button class="btn btn-dark mr-3 px-4">Agregar producto</button>
                <a href="adminProductos.php" class="btn btn-outline-secondary">
                    Volver a panel de productos
                </a>

            </form>
        </div>
    </main>

<?php  include 'includes/footer.php';  ?>