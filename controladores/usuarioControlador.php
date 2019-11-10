<?php

require '../modelo/com.sanident.modeloDao/usuarioDao.php';
require '../modelo/com.sanident.modeloDao/rolDao.php';
include '../utilidades/Conexion.php';



if (isset($_POST['IniciarSesion'])) {
    $uDao = new usuarioDao();
    $rolDao = new rolDao();
    $mensaje = "";

    $logear = $uDao->iniciarSesion($_POST['documento'], $_POST['clave']);
    $roles = $rolDao->buscarRol($logear['id']);


    if ($logear['id'] != NULL) {
        foreach ($roles as $rol) {

            session_start();
            $_SESSION['nombre'] = $logear['nombres'];
            $_SESSION['apellido'] = $logear['apellidos'];
            $_SESSION['id'] = $logear['id'];
            $_SESSION['documento'] = $logear['documento'];
            $_SESSION['rol'] = $rol['roles_id'];
            $_SESSION['estado'] = $logear['estadousuarios_id'];
            if ($_SESSION['estado'] == 1) {
                if ($_SESSION['rol'] == 1) {
                    header("Location:../vistas/citas/consultar/inicio.php");
                } else if ($_SESSION['rol'] == 2) {
                    header("Location:../vistas/vistapaciente/inicio.php");
                } else {
                    header("Location:../vistas/vistaadministrador/inicio.php");
                }
            } else {
                header("Location:../login.php?inactivo=error");
            }
        }
    } else {
        header("Location:../login.php?mensaje=error");
    }
}
    



