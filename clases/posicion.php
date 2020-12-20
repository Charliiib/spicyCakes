<?php

class posicion
{
    private $idPosicion;
    private $posicion;
    private $posicionNombre;

    public function listarPosicion()
    {
        $link = Conexion::conectar();
        $sql = "SELECT idPosicion, posicion, posicionNombre
                    FROM posicion";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $posicion = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posicion;
    }
    public function verPosicionPorID()
    {
        $link = Conexion::conectar();
        $idPosicion = $_GET['idPosicion'];
        $sql = "SELECT idPosicion, posicion, posicionNombre
                        FROM posicions
                        WHERE idPosicion = ".$idPosicion;
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $datosPosicion = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->setIdPosicion(  $datosPosicion['idPosicion'] );
        $this->setMkNombre(  $datosPosicion['posicion'] );
        $this->setMkNombre(  $datosPosicion['posicionNombre'] );
        return $this;
    }







/*
    public function agregarPosicion()
    {
        $posicionNombre = $_POST['posicionNombre'];
        $link = Conexion::conectar();
        $sql = "INSERT INTO Posicions
                       ( posicionNombre )
                    VALUES 
                        (:posicionNombre)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':posicionNombre', $posicionNombre, PDO::PARAM_STR);
        if( $stmt->execute() )
        {   // registramos atributos en el objeto
            $this->setposicionNombre($posicionNombre);
            $this->setIdPosicion( $link->lastInsertId() );
            return true;
        }
        return false;
    }
    public function modificarPosicion()
    {
        $idPosicion = $_POST['idPosicion'];
        $posicionNombre   = $_POST['posicionNombre'];
        $link = Conexion::conectar();
        $sql = "UPDATE Posicions
                        SET posicionNombre = :posicionNombre
                      WHERE idPosicion = :idPosicion";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':posicionNombre', $posicionNombre, PDO::PARAM_STR);
        $stmt->bindParam(':idPosicion', $idPosicion, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdPosicion( $idPosicion );
            $this->setposicionNombre( $posicionNombre );
            return true;
        }
        return false;

    }

    public function eliminarPosicion()
    {
        $idPosicion = $_POST['idPosicion'];
        $link = Conexion::conectar();
        $sql = "DELETE FROM Posicions 
                        WHERE idPosicion = :idPosicion";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idPosicion', $idPosicion, PDO::PARAM_INT);
        if( $stmt->execute() )
        {
            $this->setIdPosicion( $idPosicion );
            return true;
        }
        return false;

    }



    public function verProductoPorPosicion()
    {
        $link = Conexion::conectar();
        $idPosicion = $_GET['idPosicion'];
        $sql = "SELECT 1
                        FROM productos
                        WHERE idPosicion = :idPosicion";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':idPosicion', $idPosicion, PDO::PARAM_INT);
        $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;

    }



*/



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