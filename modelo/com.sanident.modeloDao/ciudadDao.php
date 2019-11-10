<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipodocumentoDao
 *
 * @author carolyiset
 */
class ciudadDao {
    
     public function listarciudad() {
        $conn = Conexion::getConexion();

        try {
            $listarciudades = 'Select * from ciudades';
            $query = $conn->prepare($listarciudades);
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        
        return $query->fetchAll();
    }
    
     public function obtenerCiudad($id){
        
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM ciudades WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insertar(ciudadDto $ciudadDto) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare('INSERT INTO ciudades (nombre) VALUES (?)');
            $query->bindParam(1, $ciudadDto->getNombre());

            $query->execute();
            $mensaje = "Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }
}
