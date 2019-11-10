<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of odontologoDao
 *
 * @author carolyiset
 */
class odontologoDao {

    public function buscarOdontologoid($id) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM personalodontologico A INNER JOIN usuarios B ON A.usuarios_id = B.id WHERE B.id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarOdontologo() {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM personalodontologico A INNER JOIN usuarios B ON A.usuarios_id = B.id");


            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarOdontologo(usuarioDto $usuarioDto, $idusuario) {
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("UPDATE usuarios SET telefono_fijo = ?,telefono_movil = ?, correoElectronico = ?, estadocivil_id = ? WHERE id = ?");
            $query->bindParam(1, $usuarioDto->getTelefonofijo());
            $query->bindParam(2, $usuarioDto->getTelefonomovil());
            $query->bindParam(3, $usuarioDto->getCorreoelectronico());
            $query->bindParam(4, $usuarioDto->getEstadocivil());
            $query->bindParam(5, $idusuario);

            $query->execute();

            $query->execute();
            $mensaje = "Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function buscarOdontologodocumento($documento) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM personalodontologico A INNER JOIN usuarios B ON A.usuarios_id = B.id WHERE B.documento = ?");
            $query->bindParam(1, $documento);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarOdontologo(usuarioDto $usuarioDto, odontologoDto $odontologoDto) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $usuarioDto->getEstadousuarios());
            $query->bindParam(2, $usuarioDto->getDocumento());
            $query->bindParam(3, $usuarioDto->getNombres());
            $query->bindParam(4, $usuarioDto->getApellidos());
            $query->bindParam(5, $usuarioDto->getFechanacimiento());
            $query->bindParam(6, $usuarioDto->getGenero());
            $query->bindParam(7, $usuarioDto->getTelefonofijo());
            $query->bindParam(8, $usuarioDto->getTelefonomovil());
            $query->bindParam(9, $usuarioDto->getCorreoelectronico());
            $query->bindParam(10, $usuarioDto->getClave());
            $query->bindParam(11, $usuarioDto->getCiudad());
            $query->bindParam(12, $usuarioDto->getEstadocivil());
            $query->bindParam(13, $usuarioDto->getTipodocumento());

            $query->execute();

            $id_usu = $conn->lastInsertId();

            $query = $conn->prepare("INSERT INTO personalodontologico VALUES ('$id_usu',?,?)");

            $query->bindParam(1, $odontologoDto->getEspecialidad());
            $query->bindParam(2, $odontologoDto->getTarjetaProfesional());


            $query->execute();

            $query = $conn->prepare("INSERT INTO usuarios_has_roles VALUES('$id_usu',1)");


            $query->execute();
            $mensaje = "Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function editarOdontologo(usuarioDto $usuarioDto, odontologoDto $odontologoDto, $id) {
        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("UPDATE usuarios SET telefono_fijo = ?,telefono_movil = ?, correoElectronico = ?, estadocivil_id = ? WHERE id = ?");
            $query->bindParam(1, $usuarioDto->getTelefonofijo());
            $query->bindParam(2, $usuarioDto->getTelefonomovil());
            $query->bindParam(3, $usuarioDto->getCorreoelectronico());
            $query->bindParam(4, $usuarioDto->getEstadocivil());
            $query->bindParam(5, $id);

            $query->execute();

            $query = $conn->prepare("UPDATE personalodontologico SET especialidad = ? WHERE usuarios_id = ?");
            $query->bindParam(1, $odontologoDto->getEspecialidad());
            $query->bindParam(2, $id);

            $query->execute();
            $mensaje = "Actualizado";
            
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

}
