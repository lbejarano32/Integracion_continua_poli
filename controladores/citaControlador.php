<?php

require '../modelo/com.sanident.modeloDao/pacienteDao.php';
require '../modelo/com.sanident.modeloDto/pacienteDto.php';
require '../modelo/com.sanident.modeloDto/usuarioDto.php';
require '../modelo/com.sanident.modeloDao/citaDao.php';
require '../modelo/com.sanident.modeloDto/citaDto.php';
require '../modelo/com.sanident.modeloDto/estadocitaDto.php';
include '../utilidades/Conexion.php';


if (isset($_POST['listarCita'])) {
    $fecha = $_POST['fecha'];
    $ctDao = new citaDao();
    $fecha = $ctDao->consultarCita($_POST['fecha']);

    if ($fecha != NULL) {
        header('Location:../vistas/paciente/pacienteexiste.php');
    } else {
        header('Location:../vistas/cita/agenda.php');
    }
} else if (isset($_POST['consultarEditar'])) {
    $fecha = $_POST['fecha'];
    $ctDao = new citaDao();
    $fecha = $ctDao->buscarCita($_POST['fecha']);

    if ($fecha != NULL) {
        header('Location:../vistas/paciente/pacienteexiste.php');
    } else {
        header('Location:../vistas/cita/agenda.php');
    }
} else if (isset($_POST['agendarCita'])) {
    echo 'controlador';
    $pacienteDao = new pacienteDao();
    $citaDao = new citaDao();
    $citaDto = new citaDto();

    if ($citaDao->buscarCitaDoc($_POST['odontologo'], $_POST['fecha'], $_POST['hora']) == NULL) {

        $citaDto->setEstadocita(1);
        $citaDto->setDoctor($_POST['odontologo']);
        $citaDto->setFecha($_POST['fecha']);
        $citaDto->setEspecialidad($_POST['especialidad']);
        $citaDto->setHora($_POST['hora']);
        $citaDto->setPaciente($_POST['idpaciente']);
        $mensaje = $citaDao->agendarcita($citaDto);
        $id = $_POST['idpaciente'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $odontologo = $_POST['odontologo'];


        header("Location: ../vistas/envioCorreo/correoAgendamiento.php?id=$id & fecha=$fecha & hora=$hora & odontologo=$odontologo");
//    header("Location: ../vistas/citas/consultar/inicio.php?exitoso");
    } else {

        header("Location:../vistas/citas/crear/buscarpaciente.php?existe");
    }
} else if (isset($_POST['ModificarCita'])) {
    $id = $_POST['id'];
    $idpaciente = $_POST['idPaciente'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $odontologo = $_POST['odontologo'];
    $citaDao = new citaDao();
    $citaDto = new citaDto();
    echo $_POST['fecha'];
    echo $_POST['hora'];
    echo $_POST['odontologo'];
    echo $_POST['idEstado'];
    echo $_POST['especialidad'];

    if ($citaDao->buscarCitaDoc($_POST['odontologo'], $_POST['fecha'], $_POST['hora']) == NULL) {
        $modificarCita = $citaDao->modificarCita($id, $citaDto);

        if ($modificarCita != NULL) {

            $citaDto->setDoctor($_POST['odontologo']);
            $citaDto->setEstadocita($_POST['idEstado']);
            $citaDto->setFecha($_POST['fecha']);
            $citaDto->setEspecialidad($_POST['especialidad']);
            $citaDto->setHora($_POST['hora']);

            $mensaje = $citaDao->modificarCita($id, $citaDto);

            header("Location: ../vistas/envioCorreo/correoReagendar.php?id=$idpaciente & fecha=$fecha & hora=$hora & odontologo=$odontologo");
        } else {
            echo 'error';
        }
    } else {

        header("Location:../vistas/citas/editar/editar.php?existe");
    }
} else if (isset($_POST['agendarCitap'])) {
    echo 'controlador';
    $citaDao = new citaDao();
    $citaDto = new citaDto();
    if ($citaDao->buscarCitaDoc($_POST['odontologo'], $_POST['fecha'], $_POST['hora']) == NULL) {
        $citaDto->setEstadocita(1);
        $citaDto->setDoctor($_POST['odontologo']);
        $citaDto->setFecha($_POST['fecha']);
        $citaDto->setEspecialidad($_POST['especialidad']);
        $citaDto->setHora($_POST['hora']);
        $citaDto->setPaciente($_POST['idpaciente']);


        $mensaje = $citaDao->agendarcita($citaDto);
        $id = $_POST['idpaciente'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $odontologo = $_POST['odontologo'];

        header("Location: ../vistas/vistapaciente/envioCorreo/correoAgendamiento.php?id=$id & fecha=$fecha & hora=$hora & odontologo=$odontologo");
    } else {
        header("Location: ../vistas/vistapaciente/agendar.php?existe");
    }
} else if (isset($_POST['cancelarCita'])) {
    $citaDao = new citaDao();
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idpaciente = $_POST['idPaciente'];
    $validar = $citaDao->validarhora($_POST['fecha']);
    echo $validar;
    foreach ($validar as $valida) {
        if ($valida['validar'] <= 1) {
            header("Location: ../vistas/citas/consultar/inicio.php?novalida");
        } else {
            $cancelarCita = $citaDao->eliminarCita($id);
            header("Location: ../vistas/envioCorreo/correoCancelar.php?id=$idpaciente & fecha=$fecha & hora=$hora & odontologo=$odontologo");
        }
    }
} else if (isset($_POST['ModificarCitaP'])) {
    $id = $_POST['id'];
    $idpaciente = $_POST['idPaciente'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $odontologo = $_POST['odontologo'];
    $citaDao = new citaDao();
    $citaDto = new citaDto();
    echo $_POST['fecha'];
    echo $_POST['hora'];
    echo $_POST['odontologo'];
    echo $_POST['idEstado'];
    echo $_POST['especialidad'];

    if ($citaDao->buscarCitaDoc($_POST['odontologo'], $_POST['fecha'], $_POST['hora']) == NULL) {
        $modificarCita = $citaDao->modificarCita($id, $citaDto);

        if ($modificarCita != NULL) {

            $citaDto->setDoctor($_POST['odontologo']);
            $citaDto->setEstadocita($_POST['idEstado']);
            $citaDto->setFecha($_POST['fecha']);
            $citaDto->setEspecialidad($_POST['especialidad']);
            $citaDto->setHora($_POST['hora']);

            $mensaje = $citaDao->modificarCita($id, $citaDto);

            header("Location: ../vistas/vistapaciente/envioCorreo/correoReagendar.php?id=$idpaciente & fecha=$fecha & hora=$hora & odontologo=$odontologo");
        } else {
            echo 'error';
        }
    } else {

        header("Location:../vistas/vistapaciente/editar.php?existe");
    }
} else if (isset($_POST['cancelarCitap'])) {
    $citaDao = new citaDao();
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idpaciente = $_POST['idPaciente'];
    $validar = $citaDao->validarhora($_POST['fecha']);
    echo $validar;
    foreach ($validar as $valida) {
        if ($valida['validar'] <= 1) {
            header("Location: ../vistas/vistapaciente/inicio.php?novalida");
        } else {
            $cancelarCita = $citaDao->eliminarCita($id);
            header("Location: ../vistas/vistapaciente/envioCorreo/correoCancelar.php?id=$idpaciente & fecha=$fecha & hora=$hora & odontologo=$odontologo");
        }
    }
}
        