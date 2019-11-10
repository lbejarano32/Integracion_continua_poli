<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estadocivilDao
 *
 * @author carolyiset
 */
class estadocivilDao {
    
     public function listarestadocivil() {
        $conn = Conexion::getConexion();

        try {
            $listarestadocivil = 'Select * from estadocivil';
            $query = $conn->prepare($listarestadocivil);
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        
        return $query->fetchAll();
    }
    
    public function obtenerestadocivil($id){
        
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM estadocivil WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
