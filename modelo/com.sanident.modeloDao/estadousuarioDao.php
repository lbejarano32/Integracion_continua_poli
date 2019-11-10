<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estadousuarioDao
 *
 * @author carolyiset
 */
class estadousuarioDao {
     public function listarestadousuario() {
        $conn = Conexion::getConexion();

        try {
            $listarestadousuario = 'Select * from estadousuarios';
            $query = $conn->prepare($listarestadousuario);
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        
        return $query->fetchAll();
    }
    
    public function obtenerestadousuario($id){
        
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM estadousuarios WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
