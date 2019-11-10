<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administradorDao
 *
 * @author juan
 */
class administradorDao {
    

   public function reporteGeneral() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select * from soporte");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function reporteCerrado() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select count(estado) as Cerrado from soporte where estado = 'Cerrado'");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function reporteAsignado(){

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select count(estado) as Asignado from soporte where estado = 'Asignado'");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
   
}