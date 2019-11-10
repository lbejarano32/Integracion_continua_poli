<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDao
 *
 * @author carolyiset
 */
class usuarioDao {
      public function iniciarSesion($documento, $clave) {
        $conn = Conexion::getConexion();
        try {
            $query = $conn->prepare("SELECT * FROM usuarios where documento = ? and clave = ? ");
            $query->bindParam(1, $documento);
            $query->bindParam(2, $clave);
            $query->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $query->fetch();
    }

}
