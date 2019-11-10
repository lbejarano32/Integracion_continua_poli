<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rolDao
 *
 * @author carolyiset
 */
class rolDao {
     public function buscarRol($idusuario) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM usuarios_has_roles WHERE usuarios_id = ?");
            $query->bindParam(1, $idusuario);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
