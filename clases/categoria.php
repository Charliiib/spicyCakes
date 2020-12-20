<?php

class categoria
{
    private $idCategoria;
    private $catNombre;
    private $catSub;
    private $catDescripcion;
    private $catImagen;
    private $idPosicion;
    private $posicionNombre;
    private $posicion;

    public function listarCategorias()
    {
        $link = Conexion::conectar();
        $sql = "SELECT * 
                    FROM categoria
                    JOIN posicion ON posicion.idPosicion = categoria.idPosicion 
                    WHERE posicion.idPosicion = categoria.idPosicion ";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categoria;
    }
    public function verCategoriaPorID()
    {
        $idCategoria = $_GET['idCategoria'];
        $link = Conexion::conectar();
        $sql = "SELECT * 
                    FROM categoria
                    JOIN posicion ON posicion.idPosicion = categoria.idPosicion 
                    WHERE posicion.idPosicion = categoria.idPosicion 
                        AND idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
             if ( $stmt->execute() ){
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setIdCategoria($idCategoria);
        $this->setCatNombre($categoria['catNombre'] );
        $this->setCatSub($categoria['catSub'] );
        $this->setCatDescripcion($categoria['catDescripcion'] );
        $this->setIdPosicion($categoria['idPosicion'] );
        $this->setCatImagen($categoria['catImagen'] );
        $this->setPosicionNombre($categoria['posicionNombre'] );
        $this->setPosicion($categoria['posicion'] );
        return true;
            }
        return false;
        }


######RESOLVER, FORMULARIO PARA OBTENER MAS DATOS #####
    public function agregarCategoria()
    {
      
        $link = Conexion::conectar();
        $catNombre = $_POST['catNombre'];
        $catSub = $_POST['catSub'];
        $idPosicion = $_POST['idPosicion'];
        $catDescripcion = $_POST['catDescripcion'];
        $catImagen =  Categoria::subirImagenCat() ;
        $sql = "INSERT INTO categoria
                       ( catNombre, catSub, idPosicion, catDescripcion, catImagen )
                    VALUES 
                        (:catNombre, :catSub, :idPosicion, :catDescripcion, :catImagen )";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catNombre', $catNombre, PDO::PARAM_STR);
        $stmt->bindParam(':catSub', $catSub, PDO::PARAM_STR);
        $stmt->bindParam(':idPosicion', $idPosicion, PDO::PARAM_INT);
        $stmt->bindParam(':catDescripcion', $catDescripcion, PDO::PARAM_STR);
        $stmt->bindParam(':catImagen', $catImagen, PDO::PARAM_STR);
        if( $stmt->execute() )
        {   // registramos atributos en el objeto
        $this->setIdCategoria($link->lastInsertId());
        $this->setCatNombre($catNombre);
        $this->setCatSub($catSub);
        $this->setIdPosicion($idPosicion);
        $this->setCatDescripcion($catDescripcion);
        $this->setCatImagen($catImagen);
            return true;
        }
        return false;
    }

    #################### RESOLVER DATOS PARA MODIFICAR CATEGORIA######
    public function modificarCategoria()
    {
        
        $catNombre = $_POST['catNombre'];
        $catSub = $_POST['catSub'];
        $idPosicion = $_POST['idPosicion'];
        $catDescripcion = $_POST['catDescripcion'];
        $catImagen =  Categoria::subirImagenCat();
        $idCategoria = $_POST['idCategoria'];
        $link = Conexion::conectar();
        $sql = "UPDATE categoria
                        SET catNombre = :catNombre,
                            catSub = :catSub,
                            idPosicion = :idPosicion,
                            catDescripcion = :catDescripcion,
                            catImagen =  :catImagen 
                      WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->bindParam(':catNombre', $catNombre, PDO::PARAM_STR);
        $stmt->bindParam(':catSub', $catSub, PDO::PARAM_STR);
        $stmt->bindParam(':idPosicion', $idPosicion, PDO::PARAM_INT);
        $stmt->bindParam(':catDescripcion', $catDescripcion, PDO::PARAM_STR);
        $stmt->bindParam(':catImagen', $catImagen, PDO::PARAM_STR);
        if( $stmt->execute() )
        {
            $this->setIdCategoria($idCategoria);
            $this->setCatNombre($catNombre);
            $this->setCatSub($catSub);
            $this->setIdPosicion($idPosicion);
            $this->setCatDescripcion($catDescripcion);
            $this->setCatImagen($catImagen);
            return true;
        }
        return false;
    }


   public function subirImagenCat()
        {
            //imagen predeterminada si no enviaron nada
            // EN AGREGAR
            $catImagen = 'noDisponible.jpg';

            // imagen original en MODIFICAR si no enviaron nada
            if( isset( $_POST['catImagenOriginal'] ) ){
                $catImagen = $_POST['catImagenOriginal'];
            }

            // si enviaron algo tanto en agregar como en modificar
            if( $_FILES['catImagen']['error'] == 0 ){
                $dir = 'imagenes/';
                $tmp = $_FILES['catImagen']['tmp_name'];
                $catImagen = $_FILES['catImagen']['name'];
                move_uploaded_file( $tmp, $dir.$catImagen );
            }
            return $catImagen;
        }

    public function eliminarCategoria()
    {
        $idCategoria = $_POST['idCategoria'];
        $link = Conexion::conectar();
        $sql = "DELETE FROM categoria 
                        WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdCategoria( $idCategoria );
            return true;
        }
        return false;

    }



    public function  verProductoPorCategoria()
    {
        $link = Conexion::conectar();
        $idCategoria = $_GET['idCategoria'];
        $sql = "SELECT 1
                        FROM producto
                        WHERE idCategoria = :idCategoria";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;

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
    public function getCatSub()
    {
        return $this->catSub;
    }

    /**
     * @param mixed $catSub
     */
    public function setCatSub($catSub)
    {
        $this->catSub = $catSub;
    }

    /**
     * @return mixed
     */
    public function getCatDescripcion()
    {
        return $this->catDescripcion;
    }

    /**
     * @param mixed $catDescripcion
     */
    public function setCatDescripcion($catDescripcion)
    {
        $this->catDescripcion = $catDescripcion;
    }
 
    /**
     * @return mixed
     */
    public function getCatImagen()
    {
        return $this->catImagen;
    }

    /**
     * @param mixed $catImagen
     */
    public function setCatImagen($catImagen)
    {
        $this->catImagen = $catImagen;
    }

  /**
     * @return mixed
     */
    public function getIdPosicion()
    {
        return $this->idPosicion;
    }

    /**
     * @param mixed $idPosicion
     */
    public function setIdPosicion($idPosicion)
    {
        $this->idPosicion = $idPosicion;
    }
  
    /**
     * @return mixed
     */
    public function getPosicionNombre()
    {
        return $this->posicionNombre;
    }

    /**
     * @param mixed $posicionNombre
     */
    public function setPosicionNombre($posicionNombre)
    {
        $this->posicionNombre = $posicionNombre;
    }

 /**
     * @return mixed
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * @param mixed $posicion
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }







}













/*

    function verProductoPorCategoria()
{
    $idCategoria = $_GET['idCategoria'];
    $link = conectar();
    $sql = "SELECT 1
                        FROM productos
                        WHERE idCategoria = ".$idCategoria;
    $resultado = mysqli_query( $link, $sql )  
                            or die( mysqli_error($link) );
    $cantidad = mysqli_num_rows($resultado);
      return $cantidad;
}
    
    /*
     * listarCategoria()
     * verCategoriaPorID()
     * agregarCategoria()
     * modificarCategoria()
     * eliminarCategoria()
     * */