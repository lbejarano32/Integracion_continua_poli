<?php

/**
 * Description of pacienteDao
 *
 * @author carolyiset
 */
class pacienteDao {

    public function registrarPaciente(usuarioDto $usuarioDto, pacienteDto $pacienteDto) {

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

            $query = $conn->prepare("INSERT INTO pacientes VALUES ('$id_usu',?,?,?)");

            $query->bindParam(1, $pacienteDto->getTipoafiliacion());
            $query->bindParam(2, $pacienteDto->getEps());
            $query->bindParam(3, $pacienteDto->getRh());

            $query->execute();
            
            $query = $conn->prepare("INSERT INTO usuarios_has_roles VALUES('$id_usu',2)");
            
            
            $query->execute();
            $mensaje = "Registrado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function buscarPaciente($documento) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM pacientes A INNER JOIN usuarios B ON A.usuarios_id = B.id WHERE B.documento = ?");
            $query->bindParam(1, $documento);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarPaciente(usuarioDto $usuarioDto, pacienteDto $pacienteDto, $idusuario) {
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

           
            $query = $conn->prepare("UPDATE pacientes SET tipo_afiliacion = ?, eps = ? WHERE usuarios_id = ?");
            $query->bindParam(1, $pacienteDto->getTipoafiliacion());
            $query->bindParam(2, $pacienteDto->getEps());
            $query->bindParam(3, $idusuario);


            $query->execute();
            $mensaje = "Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

    public function buscarPacienteid($id) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("SELECT * FROM pacientes A INNER JOIN usuarios B ON A.usuarios_id = B.id WHERE B.id = ?");
            $query->bindParam(1, $id);

            $query->execute();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarEstado(usuarioDto $usuarioDto, $id) {

        $conn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $conn->prepare("UPDATE usuarios SET estadousuarios_id=? WHERE id=?");
            $query->bindParam(1, $usuarioDto->getEstadousuarios());
            $query->bindParam(2, $id);

            $query->execute();
            $mensaje = "ActualizadoEstado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $conn = null;
        return $mensaje;
    }

}
