<?php

require '../modelo/com.sanident.modeloDao/odontologoDao.php';
require '../modelo/com.sanident.modeloDto/odontologoDto.php';
require '../modelo/com.sanident.modeloDto/usuarioDto.php';
require '../utilidades/Conexion.php';


if (isset($_POST['registroOdontologo'])) {

    echo 'entro en el controlador';

    $odontologoDto = new odontologoDto();
    $oDao = new odontologoDao();
    $usuDto = new usuarioDto();
    echo $_POST['fechanacimiento'];

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
    $odontologoDto->setTarjetaProfesional($_POST['tarjetaProfesional']);
    $odontologoDto->setEspecialidad($_POST['especialidad']);

    $mensaje = $oDao->registrarOdontologo($usuDto, $odontologoDto);


    header("Location: ../vistas/vistaadministrador/Odontologo.php?Registrado");
} else if (isset($_POST['consultar'])) {
    $documento = $_POST['documento'];
    $odDao = new odontologoDao();
    $documento = $odDao->buscarOdontologo($_POST['documento']);

    if ($documento != NULL) {
        header('Location:../vistas/paciente/pacienteexiste.php');
    } else {
        header('Location:../vistas/odontologo/registrarOdontologo.php');
    }
} else if (isset($_POST['consultarEditar'])) {
    $documento = $_POST['documento'];
    $pacDao = new odontologoDao();
    $documento = $odDao->buscarOdontologo($_POST['documento']);

    if ($documento != NULL) {
        header('Location:../vistas/paciente/pacienteexiste.php');
    } else {
        header('Location:../vistas/odontologo/registrarOdontologo.php');
    }
} else if (isset($_GET['modificarOdontologo'])) {
    echo 'entro en el controlador';
    $id = $_GET['idDoctor'];
    $oDao = new odontologoDao();
    $usuDto = new usuarioDto();

    $modificarUsuario = $oDao->modificarOdontologo($usuDto, $id);
    if ($modificarUsuario != NULL) {
        $usuDto->setTelefonofijo($_GET['telefonofijo']);
        $usuDto->setTelefonomovil($_GET['telefonomovil']);
        $usuDto->setCorreoelectronico($_GET['correoelectronico']);
        $usuDto->setEstadocivil($_GET['estadocivil']);
        $dest = $_GET['correoelectronico'];


        $mensaje = $oDao->modificarOdontologo($usuDto, $id);
        header("Location: ../vistas/envioCorreo/correoAcOdontologo.php?dest=" . $dest);
    } else {
        echo 'error';
    }
} else if (isset($_GET['editarOdontologo'])) {
    echo 'entro en el controlador';
    echo $_GET['estadocivil'];
    $id = $_GET['idOdontologo'];
    $oDao = new odontologoDao();
    $oDto = new odontologoDto();
    $usuDto = new usuarioDto();

    $modificarOdontologo = $oDao->editarOdontologo($usuDto, $oDto, $id);
    if ($modificarOdontologo != NULL) {

        $usuDto->setCorreoelectronico($_GET['correo']);
        $usuDto->setTelefonofijo($_GET['telefonofijo']);
        $usuDto->setTelefonomovil($_GET['telefonomovil']);
        $usuDto->setEstadocivil($_GET['estadocivil']);
        $usuDto->setEstadousuarios($_GET['estadousuario']);

        $oDto->setEspecialidad($_GET['especialidad']);


        $mensaje = $oDao->editarOdontologo($usuDto, $oDto, $id);
        header("Location: ../vistas/vistaadministrador/Odontologo.php?Editado");
    } else {
        echo 'error';
    }
} 
        
    




