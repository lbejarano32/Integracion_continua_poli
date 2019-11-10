<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of citaDao
 *
 * @author carolyiset
 */
class citaDao {

    public function listarCita($fecha) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE fecha = ?  ORDER BY hora ASC");
            $query->bindParam(1, $fecha);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agenda($doctorid) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE fecha = CURDATE() and personalodontologico_usuarios_id = ?");
            $query->bindParam(1, $doctorid);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agendarcita(citaDto $citaDto) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("INSERT INTO citas VALUES (null,?, ?, ?, ?, ?,?)");
            $query->bindParam(1, $citaDto->getPaciente());
            $query->bindParam(2, $citaDto->getDoctor());
            $query->bindParam(3, $citaDto->getEstadocita());
            $query->bindParam(4, $citaDto->getFecha());
            $query->bindParam(5, $citaDto->getHora());
            $query->bindParam(6, $citaDto->getEspecialidad());

            $query->execute();
            $mensaje = "Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function listarCitaid($fecha, $idpaciente) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE fecha = ? and pacientes_usuarios_id = ? ORDER BY hora ASC");
            $query->bindParam(1, $fecha);
            $query->bindParam(2, $idpaciente);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agendapa($idpaciente) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE fecha = CURDATE() and pacientes_usuarios_id=?");
            $query->bindParam(1, $idpaciente);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarcitadocumento($id) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarCita($id, citaDto $citaDto) {
        $conn = Conexion::getConexion();

        try {
            $query = $conn->prepare("UPDATE citas SET personalodontologico_usuarios_id= ?, estadocitas_id = ?, fecha= ?, hora= ?, especialidad = ? WHERE id = ?");
            $query->bindParam(1, $citaDto->getDoctor());
            $query->bindParam(2, $citaDto->getEstadocita());
            $query->bindParam(3, $citaDto->getFecha());
            $query->bindParam(4, $citaDto->getHora());
            $query->bindParam(5, $citaDto->getEspecialidad());
            $query->bindParam(6, $id);


            $query->execute();
            $mensaje = "Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function buscarCitaDoc($idOdontologo, $fecha, $hora) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE personalodontologico_usuarios_id = ? and fecha = ? and hora = ? ");
            $query->bindParam(1, $idOdontologo);
            $query->bindParam(2, $fecha);
            $query->bindParam(3, $hora);



            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarCita($id) {
        $conn = Conexion::getConexion();

        try {
            $query = $conn->prepare("UPDATE citas SET estadocitas_id = 2 WHERE id = ?");
            $query->bindParam(1, $id);


            $query->execute();
            $mensaje = "Cancelada";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function validarhora($fecha) {
        $conn = Conexion::getConexion();

        try {
            $query = $conn->prepare("SELECT DATEDIFF(MIN(?), MAX(CURDATE())) as validar");
            $query->bindParam(1, $fecha);


            $query->execute();
            $mensaje = "validada";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
     public function listarcitapaciente($idpaciente) {
        $conn = Conexion::getConexion();
        $mensaje = "";

        try {
            $query = $conn->prepare("SELECT * FROM citas WHERE pacientes_usuarios_id = ?");
            $query->bindParam(1, $idpaciente);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
