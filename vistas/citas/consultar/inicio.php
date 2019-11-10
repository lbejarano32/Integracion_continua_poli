<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
                <?php include '../../template/head.php'; ?>
        <meta charset="UTF-8">
        <title>Inicio</title>
         <?php
        if (isset($_GET['exitoso'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Ha agendado la cita exitosamente");
            </script>

        <?php } ?>
              <?php
        if (isset($_GET['actualizado'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("sus datos han sido actualizaddos exitosamente");
            </script>

        <?php } ?>
            
             <?php
        if (isset($_GET['registrado'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Paciente Registrado Exitosamente");
            </script>

        <?php } ?>
             <?php
        if (isset($_GET['novalida'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("No puede cancelar esta cita, debe ser inferior a 24 horas");
            </script>

        <?php } ?>
                <?php
        if (isset($_GET['cancelado'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Cita Cancelada");
            </script>

        <?php } ?>
    </head>
    <body>
        <?php
        
    session_start();
//  session_destroy();


    if ($_SESSION['id'] != NULL && $_SESSION['rol'] == 1) {
        ?>

 
    <div class="header" id="move-top">
        <div class="container">
            <div class="header-left">
                <div class="logo">
                    <img src="../../../resources/images/logo4.png" width="120%" height="120%"/>
                    

                </div>
            </div>

            <div>

                <ul class="header-right">
                    <li>						
                        <img src="../../../resources/images/wo.jpg" width="120%" height="120%"/>
                    </li>

                </ul>
                <div class="nombreusuario">
                    <ul class="nombreusuarios">
                        <li class="nombre"><a><?php echo $_SESSION['nombre']; ?> </a>
                           

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <?php
        
        include '../../template/menu.php';

        ini_set('date.timezone', 'America/Bogota');
        $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        ?>


        <div class="content-main">

            <div class="banner1">
                <h2>
                    <a href="../../citas/consultar/inicio.php">Inicio</a>

                </h2>
            </div>
            <div class="validation-system">

                <div class="validation-form">

                    <h2 align="center">Mis Citas</h2>

                    <div class="clearfix"></div>
                    <?php
                    require '../../../modelo/com.sanident.modeloDao/citaDao.php';
                    require '../../../modelo/com.sanident.modeloDao/pacienteDao.php';
                    require '../../../modelo/com.sanident.modeloDao/odontologoDao.php';
                    require '../../../modelo/com.sanident.modeloDao/estadocitaDao.php';
                    include '../../../utilidades/Conexion.php';
                    $pacDao = new pacienteDao();
                    $oDao = new odontologoDao();
                    $ecDao = new estadocitaDao();
                    $listarcita = new citaDao();
                    $liscita = $listarcita->agenda($_SESSION['id']);
                    ?>
                    <div>
                        <h3 align ="center"><?php echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y'); ?></h3>
                        <br>
                        <div>

                            <table class="table">
                                <thead>
                                    <tr class="table-row">
                                        <th width="450">Paciente</th>
                                        <th width="450">Doctor</th>
                                        <th width="400">Hora</th>
                                        <th width="400">Estado</th>
                                        <th width="400">Opciones</th>
                                    
                                    </tr>
                                </thead>
                                </tbody>
                                <?php
                                if (!empty($liscita)) {
                                    foreach ($liscita as $cita) {
                                        ?>

                                        <tr>

                                            <td class="table-text" >
                                                <?php
                                                $idPaciente = $pacDao->buscarPacienteid($cita['pacientes_usuarios_id']);
                                                foreach ($idPaciente as $paciente) {
                                                    ?>
                                                    <h6><?php
                                                        echo $paciente['nombres'];
                                                        echo ' ';
                                                        echo $paciente['apellidos'];
                                                        ?></h6>
                                                    <p><?php
                                                        echo $paciente['documento'];
                                                    }
                                                    ?>
                                                </p>
                                            </td>



                                            <td class="table-text" >
                                                <?php
                                                $idoctor = $oDao->buscarOdontologoid($cita['personalodontologico_usuarios_id']);

                                                foreach ($idoctor as $doctor) {
                                                    ?>
                                                    <h6><?php
                                                        echo $doctor['nombres'];
                                                        echo ' ';
                                                        echo $doctor['apellidos'];
                                                        ?></h6>
                                                    <p><?php
                                                        echo $doctor['especialidad'];
                                                    }
                                                    ?></p>
                                            </td>
                                            <td class="table-text">
                                                <h6><?php echo $cita['hora']; ?>
                                                </h6>
                                            </td>


                                            <td class="table-text">
                                                <?php
                                                $estadocita = $ecDao->obtenerestadocita($cita['estadocitas_id']);
                                                foreach ($estadocita as $estado) {
                                                    ?>
                                                    <h6><?php echo $estado['nombre'];
                                                    ?></h6>
                                                </td>
                                                <td><a href="../editar/editar.php?id=<?php echo $cita['id']; ?>">Modificar</a>
                                                       &nbsp;&nbsp;&nbsp;
                                                        <a href="../editar/cancelar.php?id=<?php echo $cita['id']; ?>">Cancelar</a> </td>


<!--                                                <td>&nbsp;<a href="javascript:editarCita('.$registro2['id'].');" class="glyphicon glyphicon-edit"></a> &nbsp &nbsp &nbsp<a href="javascript:eliminarCita('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>-->
                                            </tr>

                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;"> No tiene citas agendadas. </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>




                            </table>
                        </div>

                    </div> 
                </div> 
            </div>
    



</body>
<?php

include '../../template/footer.php';
include '../../template/script.php';
?>
     <?php
    } else {
        header("Location:../../../index.php");
    }
    ?>
</html>
