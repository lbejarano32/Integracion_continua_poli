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
class tipodocumentoDao {
    
     public function listarDocumento() {
        $conn = Conexion::getConexion();

        try {
            $listardocumento = 'Select * from tipodocumento';
            $query = $conn->prepare($listardocumento);
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        
        return $query->fetchAll();
    }
    
    public function obtenerDocumento($id){
        
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM tipodocumento WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
 

