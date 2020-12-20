<?php

    class producto
    {
        public $idProducto;
        public $prdNombre;
        public $prdPrecio;
        public $catNombre;
        public $idCategoria;
        public $prdDescripcion;
        public $prdImagen;



        public function listarProductos()
        {
            $link = Conexion::conectar();
            $sql = "SELECT  
                            idProducto,
                            prdNombre, prdPrecio,  
                            p.idCategoria, catNombre,
                            prdDescripcion, prdImagen
                      FROM 
                            producto p, categoria c
                      WHERE 
                          p.idCategoria = c.idCategoria ";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }



        public function verProductoPorID()
        {
            $idProducto = $_GET['idProducto'];
            $link = Conexion::conectar();
            $sql = "SELECT  
                        idProducto,
                        prdNombre, prdPrecio, 
                        p.idCategoria, catNombre,
                        prdDescripcion, prdImagen
                  FROM 
                        producto p, categoria c
                  WHERE 
                   p.idCategoria = c.idCategoria
                     AND idProducto = :idProducto";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            if ( $stmt->execute() ){
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->setIdProducto($idProducto);
                $this->setPrdNombre($producto['prdNombre']);
                $this->setPrdPrecio($producto['prdPrecio']);
                $this->setIdCategoria($producto['idCategoria']);
                $this->setCatNombre($producto['catNombre']);
                $this->setPrdDescripcion($producto['prdDescripcion']);
                $this->setPrdImagen($producto['prdImagen']);
                return true;
            }
            return false;
        }   




        public function listarUltimosTres()
        {
            $link = Conexion::conectar();
            $sql = "SELECT  
                            idProducto,
                            prdNombre, prdPrecio,  
                            p.idCategoria, catNombre,
                            prdDescripcion, prdImagen
                      FROM 
                            producto p, categoria c
                      WHERE 
                          p.idCategoria = c.idCategoria
                         ORDER BY idProducto DESC
                         LIMIT 3";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }


        public function listarPrdPorCategorias()
        {
            $idCategoria = $_GET['idCategoria'];
            $link = Conexion::conectar();
            $sql = "SELECT  
                        idProducto,
                        prdNombre, prdPrecio, 
                        idCategoria,
                        prdDescripcion, prdImagen
                      FROM 
                               producto 
                      WHERE 
                          idCategoria = :idCategoria";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $stmt->execute();
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $productos;
        }









        public function subirImagen()
        {
            //imagen predeterminada si no enviaron nada
            // EN AGREGAR
            $prdImagen = 'noDisponible.jpg';

            // imagen original en MODIFICAR si no enviaron nada
            if( isset( $_POST['prdImagenOriginal'] ) ){
                $prdImagen = $_POST['prdImagenOriginal'];
            }

            // si enviaron algo tanto en agregar como en modificar
            if( $_FILES['prdImagen']['error'] == 0 ){
                $dir = 'imagenes/';
                $tmp = $_FILES['prdImagen']['tmp_name'];
                $prdImagen = $_FILES['prdImagen']['name'];
                move_uploaded_file( $tmp, $dir.$prdImagen );
            }
            return $prdImagen;
        }




        public function agregarProducto()
        {
            $link = Conexion::conectar();
            $prdNombre = $_POST['prdNombre'];
            $prdPrecio = $_POST['prdPrecio'];
            $idCategoria = $_POST['idCategoria'];
            $prdDescripcion = $_POST['prdDescripcion'];
            $prdImagen =  Producto::subirImagen() ;
            $sql = "INSERT INTO producto 
                            (prdNombre, prdPrecio, idCategoria, prdDescripcion, prdImagen )
                    VALUES 
                    ( :prdNombre, :prdPrecio, :idCategoria, :prdDescripcion, :prdImagen) ";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':prdNombre', $prdNombre, PDO::PARAM_STR);
            $stmt->bindParam(':prdPrecio', $prdPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $stmt->bindParam(':prdDescripcion', $prdDescripcion, PDO::PARAM_INT);
            $stmt->bindParam(':prdImagen', $prdImagen, PDO::PARAM_STR);
            if ( $stmt->execute() ){
                $this->setIdProducto($link->lastInsertId());
                $this->setPrdNombre($prdNombre);
                $this->setPrdPrecio($prdPrecio);
                $this->setIdCategoria($idCategoria);
                $this->setPrdDescripcion($prdDescripcion);
                $this->setPrdImagen($prdImagen);
                return true;
            }
            return false;
        }

        public function modificarProducto()
        {
            $link = Conexion::conectar();
            $prdNombre = $_POST['prdNombre'];
            $prdPrecio = $_POST['prdPrecio'];
            $idCategoria = $_POST['idCategoria'];
            $prdDescripcion = $_POST['prdDescripcion'];
            $prdImagen =  Producto::subirImagen();
            $idProducto = $_POST['idProducto'];
            $sql = "UPDATE producto
                SET prdNombre =  :prdNombre,
                    prdPrecio = :prdPrecio,
                    idCategoria = :idCategoria,
                    prdDescripcion = :prdDescripcion,
                    prdImagen =  :prdImagen 
                WHERE idProducto = :idProducto";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(':prdNombre', $prdNombre, PDO::PARAM_STR);
            $stmt->bindParam(':prdPrecio', $prdPrecio, PDO::PARAM_INT);
            $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
            $stmt->bindParam(':prdDescripcion', $prdDescripcion, PDO::PARAM_STR);
            $stmt->bindParam(':prdImagen', $prdImagen, PDO::PARAM_STR);
            if ( $stmt->execute() )
            {
                $this->setIdProducto($idProducto);
                $this->setPrdNombre($prdNombre);
                $this->setPrdPrecio($prdPrecio);
                $this->setIdCategoria($idCategoria);
                $this->setPrdDescripcion($prdDescripcion);
                $this->setPrdImagen($prdImagen);
                return true;
            }
            return false;
        }

        public function eliminarProducto()
        {
            $idProducto = $_POST['idProducto'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM producto 
                    WHERE idProducto = :idProducto";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            if( $stmt->execute() )
            {
                $this->setIdProducto( $idProducto );
                return true;
            }
            return false;

        }


        ###########################################################


/**
 * @return mixed
 */
public function getIdProducto()
{
    return $this->idProducto;
}

/**
 * @param mixed $idProducto
 */
public function setIdProducto($idProducto)
{
    $this->idProducto = $idProducto;
}

/**
 * @return mixed
 */
public function getPrdNombre()
{
    return $this->prdNombre;
}

/**
 * @param mixed $prdNombre
 */
public function setPrdNombre($prdNombre)
{
    $this->prdNombre = $prdNombre;
}

/**
 * @return mixed
 */
public function getPrdPrecio()
{
    return $this->prdPrecio;
}

/**
 * @param mixed $prdPrecio
 */
public function setPrdPrecio($prdPrecio)
{
    $this->prdPrecio = $prdPrecio;
}

/**
 * @return mixed
 */
public function getMkNombre()
{
    return $this->mkNombre;
}

/**
 * @param mixed $mkNombre
 */
public function setMkNombre($mkNombre)
{
    $this->mkNombre = $mkNombre;
}

/**
 * @return mixed
 */
public function getCatNombre()
{
    return $this->catNombre;
}

/**
 * @param mixed $catNombre
 */
public function setCatNombre($catNombre)
{
    $this->catNombre = $catNombre;
}

/**
 * @return mixed
 */
public function getPrdDescripcion()
{
    return $this->prdDescripcion;
}

/**
 * @param mixed $PrdDescripcion
 */
public function setPrdDescripcion($prdDescripcion)
{
    $this->prdDescripcion = $prdDescripcion;
}

/**
 * @return mixed
 */
public function getPrdImagen()
{
    return $this->prdImagen;
}

/**
 * @param mixed $prdImagen
 */
public function setPrdImagen($prdImagen)
{
    $this->prdImagen = $prdImagen;
}


        /**
         * @return mixed
         */
        public function getIdCategoria()
        {
            return $this->idCategoria;
        }

        /**
         * @param mixed $idCategoria
         */
        public function setIdCategoria($idCategoria)
        {
            $this->idCategoria = $idCategoria;
        }

        /**
         * @return mixed
         */
        public function getIdMarca()
        {
            return $this->idMarca;
        }

        /**
         * @param mixed $idMarca
         */
        public function setIdMarca($idMarca)
        {
            $this->idMarca = $idMarca;
        }

        /**
         * @return mixed
         */
        public function getPrdStock()
        {
            return $this->prdStock;
        }

        /**
         * @param mixed $prdStock
         */
        public function setPrdStock($prdStock)
        {
            $this->prdStock = $prdStock;
        }

    }
