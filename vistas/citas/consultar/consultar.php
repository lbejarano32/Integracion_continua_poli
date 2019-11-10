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
        <title>Agenda</title>
        <script>
            $(function () {
                $('#txtDate').datepicker({
                    beforeShowDay: $.datepicker.noWeekends,
                    dateFormat: 'yy/mm/dd',
                    changeMonth: true,
                    changeYear: true

                });
            });
        </script>
    </head>
    <?php
    session_start();
//  session_destroy();


    if ($_SESSION['id'] != NULL && $_SESSION['rol'] == 1) {
        ?>
        <body>

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
            ?>



            <div class="content-main">

                <div class="banner1">
                    <h2>
                        <a href="../../citas/consultar/inicio.php">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Consultar Cita</span>
                    </h2>
                </div>
                <div class="validation-system">

                    <div class="validation-form">

                        <h2 align="center"><strong>Mis Citas</strong></h2>

                        <div class="col-md-6">


                            <form  id="formulario" method="post" action="consultar.php">

                                <div class="form-group">
                                </div>
                                <div class="col-md-6 form-group form-last group-text ">

                                    <h4>Consulte Fecha</h4>

                                    <br>

                                    <input class="form-control" type="text"  id="txtDate" placeholder="Fecha" name="fechaconsulta" required="true">
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-md-6 form-group">
                                    <input type="submit" class="btn btn-primary" id="consultar" name='listarCita' value="Consultar"/>
                                </div>


                            </form>
                        </div>
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
                        if (isset($_POST['listarCita'])) {
                            $fecha = $_POST['fechaconsulta'];
                            $listarcita = new citaDao();
                            ?>



                            <div>
                                <h3 align ="center"> Fecha: <?php echo $_POST['fechaconsulta']; ?></h3>
                                <br>


                                <table class="table">
                                    <thead>
                                        <tr class="table-row">
                                            <th width="500">Paciente</th>
                                            <th width="500">Doctor</th>
                                            <th width="400">Hora</th>
                                            <th width="400">Estado</th>
                                            <th width="400">Opciones</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    <?php
                                    $liscita = $listarcita->listarCita($_POST['fechaconsulta']);
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


                                        <!--<td>&nbsp;<a href="javascript:editarCita('.$registro2['id'].');" class="glyphicon glyphicon-edit"></a> &nbsp &nbsp &nbsp<a href="javascript:eliminarCita('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a></td>-->
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