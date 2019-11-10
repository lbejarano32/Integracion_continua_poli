<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporteCitaDao
 *
 * @author juan
 */
class reporteCitaDao {
    
  public function reporteAgendada() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select count(estadocitas_id) as Agendadas from citas where estadocitas_id = 1");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function reporteReagendada() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select count(estadocitas_id) as reagendadas from citas where estadocitas_id = 3");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function reporteCancelada() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("select count(estadocitas_id) as Canceladas from citas where estadocitas_id = 2");
            $query->execute();
            
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
