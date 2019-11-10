<?php

require '../modelo/com.sanident.modeloDao/pacienteDao.php';
require '../modelo/com.sanident.modeloDto/pacienteDto.php';
require '../modelo/com.sanident.modeloDto/usuarioDto.php';
include '../utilidades/Conexion.php';


if (isset($_POST['registroPaciente'])) {

    echo 'entro en el controlador';
    
    $pacDao = new pacienteDao();
    $pacDto = new pacienteDto();
    $usuDto = new usuarioDto();
    $dest = $_POST['correo'];
    $clave = $_POST['documento'];
    $usuDto->setEstadousuarios(1);
    $usuDto->setNombres($_POST['nombre']);
    $usuDto->setApellidos($_POST['apellido']);
    $usuDto->setTipodocumento($_POST['tipodocumento']);
    $usuDto->setDocumento($_POST['documento']);
    $usuDto->setCiudad($_POST['ciudad']);
    $usuDto->setClave($_POST['documento']);
    $usuDto->setCorreoelectronico($_POST['correo']);
    $usuDto->setEstadocivil($_POST['estadocivil']);
    $usuDto->setFechanacimiento($_POST['fechanacimiento']);
    $usuDto->setGenero($_POST['genero']);
    $usuDto->setTelefonofijo($_POST['telefonofijo']);
    $usuDto->setTelefonomovil($_POST['telefonomovil']);

//    $pacDto->setId(6);
    $pacDto->setEps($_POST['eps']);
    $pacDto->setTipoafiliacion($_POST['afiliacion']);
    $pacDto->setRh($_POST['rh']);

    $mensaje = $pacDao->registrarPaciente($usuDto, $pacDto);

//    header("Location: ../enviocorreo.php");

    header("Location: ../vistas/envioCorreo/correoBienvenida.php?dest=$dest & clave=$clave");
    
} else if (isset($_POST['consultar'])) {
    
    $doc = $_POST['documento'];
    $pacDao = new pacienteDao();
    $documento = $pacDao->buscarPaciente($_POST['documento']);
    

    if ($documento != NULL) {
        header('Location:../vistas/paciente/crear/existe.php');
    } else {
        header('Location:../vistas/paciente/crear/registrarPaciente.php?documento='.$doc);
    }
    
} else if (isset($_GET['consultarEditar'])) {
    $documento = $_GET['documento'];
    $pacDao = new pacienteDao();
    $obpaciente = $pacDao->buscarPaciente($_GET['documento']);
    if ($obpaciente != NULL) {
        header("Location:../vistas/paciente/editar/editarPaciente.php?documento=" . $documento);
    } else {
        header('Location:../vistas/paciente/editar/noexiste.php');
    }
} else if (isset($_GET['modificarPaciente'])) {
    echo 'entro en el controlador';
    $id = $_GET['idPaciente'];
    $pacDao = new pacienteDao();
    $pacDto = new pacienteDto();
    $usuDto = new usuarioDto();

    $modificarUsuario = $pacDao->modificarPaciente($usuDto, $pacDto, $id);
    if ($modificarUsuario != NULL) {
        $usuDto->setTelefonofijo($_GET['telefonofijo']);
        $usuDto->setTelefonomovil($_GET['telefonomovil']);
        $usuDto->setCorreoelectronico($_GET['correoelectronico']);
        $usuDto->setEstadocivil($_GET['estadocivil']);

        $pacDto->setEps($_GET['eps']);
        $pacDto->setTipoafiliacion($_GET['afiliacion']);

        $mensaje = $pacDao->modificarPaciente($usuDto, $pacDto, $id);
        header("Location: ../vistas/paciente/editar/listar.php?id=" . $id);
    } else {
        echo 'error';
    }
} else if (isset($_POST['consultarAgendar'])) {
    $documento = $_POST['documento'];
    $pacDao = new pacienteDao();
    $obpaciente = $pacDao->buscarPaciente($_POST['documento']);
    if ($obpaciente != NULL) {
        header("Location:../vistas/citas/crear/agendarcita.php?documento=" . $documento);
    } else {
        header('Location:../vistas/citas/crear/noexiste.php');
    }
} else if (isset($_GET['modificarEstado'])) {
    $id = $_GET['idusuario'];
    $pacDao = new pacienteDao();
    $usuDto = new usuarioDto();
    $estadousuario = $pacDao->actualizarEstado($usuDto, $id);
    if ($estadousuario != NULL) {
        $usuDto->setEstadousuarios($_GET['estadousuario']);
        $mensaje = $pacDao->actualizarEstado($usuDto, $id);
        header("Location: ../vistas/paciente/listar/estadoExitoso.php?mensaje=" . $mensaje);
    }
} else if (isset($_GET['modificarPacientep'])) {
    echo 'entro en el controlador';
    $id = $_GET['idPaciente'];
    $pacDao = new pacienteDao();
    $pacDto = new pacienteDto();
    $usuDto = new usuarioDto();

    $modificarUsuario = $pacDao->modificarPaciente($usuDto, $pacDto, $id);
    if ($modificarUsuario != NULL) {
        $usuDto->setTelefonofijo($_GET['telefonofijo']);
        $usuDto->setTelefonomovil($_GET['telefonomovil']);
        $usuDto->setCorreoelectronico($_GET['correoelectronico']);
        $usuDto->setEstadocivil($_GET['estadocivil']);

        $pacDto->setEps($_GET['eps']);
        $pacDto->setTipoafiliacion($_GET['afiliacion']);

        $mensaje = $pacDao->modificarPaciente($usuDto, $pacDto, $id);
        header("Location: ../vistas/vistapaciente/inicio.php?actualizado");
    } else {
        echo 'error';
    }
} 






    