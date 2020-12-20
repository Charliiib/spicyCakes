<?php
    require 'config/config.php';
    $Autenticar = new autenticar;
    $Autenticar->autenticar();
    $producto = new producto();
    $productos = $producto->listarProductos();
    include 'includes/header.html';
    include 'includes/nav.php';

?>
<main class="container">
    <h1>Panel de administración de productos </h1>




<form method="POST"> 
    <label class="font-weight-bold font-italic mt-3" >Ordenar productos</label>
        <div class=" form-group  ">  
            <select class=" " name="id_producto" id="id_producto"> 
                <option value="1" class="dropdown-item bg-dark text-white">Orden alfabético (A-Z)</option>
                <option value="2" class="dropdown-item bg-dark text-white">Orden por ID</option>
                <option value="3" class="dropdown-item bg-dark text-white">Precio más bajo a más alto</option>
                <option value="4" class="dropdown-item bg-dark text-white">Precio más alto a más bajo</option>
            </select>
                <button class="btn btn-outline-secondary btn-md ml-2 " type="submit">Aplicar</button>
                <a href="admin.php" class="btn btn-outline-secondary btn-md  " >Volver a principal</a>
        </div>
</form>  

<table class="table table-border table-hover table-striped">
    <thead class="thead-dark">
        <tr>
            <th>idProducto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th colspan="2">
                <a href="formAgregarProducto.php" class="btn btn-dark">Agregar</a>
            </th>
        </tr>
    </thead>

    <tbody>
<?php
            foreach ($productos as $producto){
?>
        <tr>
            <td><?= $producto['idProducto'] ?></td>
            <td><?= $producto['prdNombre'] ?></td>
            <td>$<?= $producto['prdPrecio'] ?></td>
            <td><?= $producto['catNombre'] ?></td>
            <td><?= $producto['prdDescripcion'] ?></td>
            <td><img src="imagenes/<?= $producto['prdImagen'] ?>" class="img-thumbnail"></td>
            <td>
                <a href="formModificarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">Modificar</a>
            </td>
            <td>
                <a href="formEliminarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">Eliminar</a>
            </td>
        </tr>
<?php
                                                }
?>
    </tbody>
</table>
                <a href="admin.php" class="btn btn-outline-secondary my-3">Volver a principal</a>
</main>



<?php
    include 'includes/footer.php';
?>