<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estadocitaDao
 *
 * @author carolyiset
 */
class estadocitaDao {
    
    public function obtenerestadocita($id){
        
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM estadocitas WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
