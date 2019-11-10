<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Cita</title>
        <?php include '../../template/head.php'; ?>
        <meta charset="UTF-8">
        <script src="../../../resources/jquery-ui-1.12.1.custom/external/jquery/jquery.js" type="text/javascript"></script>
        <link href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script> 
        <script src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>

        <title>Inicio</title>

    <a href="editar.php"></a>
    <script>
        $(function () {
            $('#txtDate').datepicker({
                beforeShowDay: $.datepicker.noWeekends,
                minDate: 1,
                dateFormat: 'yy/mm/dd',
                changeMonth: true,
                changeYear: true,

            });
        });
    </script>

    <?php
    if (isset($_GET['existe'])) {
        ?>
        <script languaje="javascript" type="text/javascript">
            alert("Ya existe una cita a esta hora");
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


        <?php include '../../template/menu.php'; ?>

        <div class="content-main">

            <div class="banner1">
                <h2>
                    <a href="../../citas/consultar/inicio.php">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                    <span>Modificar cita.</span>
                </h2>
            </div>

            <div class="validation-system">

                <div class="validation-form">

                    <h3 align="center" style="font-family:sans-serif; color: #3FB5C4"><strong>Modificar Cita</strong></h3>
                    <br>

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <?php
                            require '../../../modelo/com.sanident.modeloDao/pacienteDao.php';
                            require '../../../modelo/com.sanident.modeloDao/tipodocumentoDao.php';
                            require '../../../modelo/com.sanident.modeloDao/citaDao.php';
                            include '../../../utilidades/Conexion.php';
                            $citaDao = new citaDao();
                            $listarcita = $citaDao->listarcitadocumento($_GET['id']);
                            foreach ($listarcita as $cita) {
                                if ($_GET['id'] != NULL) {
                                    $pDao = new pacienteDao();
                                    $tdDao = new tipodocumentoDao();
                                    $paciente = $pDao->buscarPacienteid($cita['pacientes_usuarios_id']);

                                    if (!empty($paciente)) {
                                        foreach ($paciente as $pa) {
                                            $tipodocumento = $tdDao->obtenerDocumento($pa['tipodocumento_id']);
                                            foreach ($tipodocumento as $td) {
                                                ?> 
                                                <form id="formulario" method="POST" action="../../../controladores/citaControlador.php">
                                                    <input name="id" value="<?php echo $cita['id'] ?>" hidden="true"/>
                                                    <input name="idEstado" value="3" hidden="true"/>
                                                    <input name="idPaciente" value="<?php echo $pa['id'] ?>" hidden="true"/>

                                                    <div class="col-md-12 form-group1">
                                                        <div class='col-md-2'>
                                                            <h3>Paciente:  </h3>
                                                        </div>
                                                        <div class='col-md-4'>


                                                            <h4><?php
                                                                echo $pa['nombres'];
                                                                echo ' ';
                                                                echo $pa['apellidos']
                                                                ?></h4>
                                                            <p>  <?php
                                                                echo $td['nombre'];
                                                                echo ': ';
                                                                echo $pa['documento'];
                                                            }
                                                            ?></p>
                                                    </div>
                                                </div><br>


                                                <div class="clearfix"></div>
                                                <br>

                                                <div class="col-md-12">
                                                    <div class="col-md-6 form-group2 group-mail">
                                                        <label class="control-label">Doctor.</label>
                                                        <select  name = "odontologo">
                                                            <?php
                                                            require '../../../modelo/com.sanident.modeloDao/odontologoDao.php';
                                                            $odoDao = new odontologoDao();

                                                            $dDao = new odontologoDao();
                                                            $alldoctor = $dDao->listarOdontologo();
                                                            foreach ($alldoctor as $doctor) {
                                                                ?>

                                                                <option name="odontologo" value="<?php echo $doctor['id'] ?>" > <?php
                                                                    echo $doctor['nombres'];
                                                                    echo ' ';
                                                                    echo $doctor['apellidos']
                                                                    ?>  </option>
                                                            <?php }
                                                            ?>

                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 form-group2 group-mail">
                                                        <label class="control-label">Tipo de Cita.</label>
                                                        <select name="especialidad">
                                                            <option name="especialidad" value="<?php echo $cita['especialidad'] ?>"><?php echo $cita['especialidad'] ?></option>
                                                            <option name="especialidad" value="Ortodoncia">Ortodoncia</option>
                                                            <option name="especialidad" value="Endodoncia">Endodoncia</option>
                                                            <option name="especialidad" value="Periodoncia">Periodoncia</option>
                                                            <option name="especialidad" value="Rehabilitación Oral">Rehabilitación Oral</option>
                                                            <option name="especialidad" value="Implantes Dentales">Implantes Dentales</option>
                                                            <option name="especialidad" value="Odonto-Pediatría">Odonto-Pediatría</option>
                                                            <option name="especialidad" value="Odontología Estética">Odontología Estética</option>
                                                            <option name="especialidad" value="Urgencia">Urgencia</option>
                                                            <option name="especialidad" value="Radiografía Oral">Radiografía Oral</option>
                                                            <option name="especialidad" value="Blanqueamiento Dental">Blanqueamiento Dental</option>
                                                            <option name="especialidad" value="iseño de Sonrrisa">Diseño de Sonrrisa</option>
                                                            <option name="especialidad" value="Incrustaciones Inlay">Incrustaciones Inlay</option>
                                                            <option name="especialidad" value="Coronas">Coronas</option>
                                                            <option name="especialidad" value="Cirugía Oral">Cirugía Oral</option>



                                                        </select>
                                                    </div>

                                                    <input   name="idpaciente" value="<?php echo $pa['id']; ?>" hidden="true">



                                                    <div class="col-md-6 form-group2 group-mail">
                                                        <label class="control-label">Fecha</label>


                                                        <input  class="form-control1" type="text" id="txtDate" name="fecha" placeholder="dd/mm/aaa" required="true" />


                                                    </div>
                                                    <div class="col-md-6 form-group2 group-mail">
                                                        <label class="control-label">Hora</label>

                                                        <select name ="hora">
                                                            <option name ="hora" value="07:00">07:00 AM</option>
                                                            <option name ="hora" value="07:20">07:20 AM</option>
                                                            <option name ="hora" value="07:40">07:40 AM</option>
                                                            <option name ="hora" value="08:00">08:00 AM</option>
                                                            <option name ="hora" value="08:20">08:20 AM</option>
                                                            <option name ="hora" value="08:40">08:40 AM</option>
                                                            <option name ="hora" value="09:00">09:00 AM</option>
                                                            <option name ="hora" value="09:20">09:20 AM</option>
                                                            <option name ="hora" value="09:40">09:40 AM</option>
                                                            <option name ="hora" value="10:00">10:00 AM</option>
                                                            <option name ="hora" value="10:20">10:20 AM</option>
                                                            <option name ="hora" value="10:40">10:40 AM</option>
                                                            <option name ="hora" value="11:00">11:00 AM</option>
                                                            <option name ="hora" value="11:20">11:20 AM</option>
                                                            <option name ="hora" value="11:40">11:40 AM</option>
                                                            <option name ="hora" value="12:00">12:00 M</option>
                                                            <option name ="hora" value="12:20">12:20 PM</option>
                                                            <option name ="hora" value="12:40">12:40 PM</option>
                                                            <option name ="hora" value="13:00">01:00 PM</option>
                                                            <option name ="hora" value="13:20">01:20 PM</option>
                                                            <option name ="hora" value="13:40">01:40 PM</option>
                                                            <option name ="hora" value="14:00">02:00 PM</option>
                                                            <option name ="hora" value="14:20">02:20 PM</option>
                                                            <option name ="hora" value="14:40">02:40 PM</option>
                                                            <option name ="hora" value="15:00">03:00 PM</option>
                                                            <option name ="hora" value="15:20">03:20 PM</option>
                                                            <option name ="hora" value="15:40">03:40 PM</option>
                                                            <option name ="hora" value="16:00">04:00 PM</option>
                                                            <option name ="hora" value="16:20">04:20 PM</option>
                                                            <option name ="hora" value="16:40">04:40 PM</option>

                                                        </select>

                                                    </div>
                                                    <div class="clearfix"> </div>
                                                    <br

                                                        <div class="col-md-6 form-group1">
                                                        <input type="submit" class="btn btn-primary" name="ModificarCita" value="Aceptar"/>


                                                    </div>


                                                    <div class="clearfix"> </div>

                                            </form >
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>

                            <!---->
                        </div>

                    </div>
                </div>


                <div class="clearfix"></div>
                <br>

            </div>
        </div>
        <div class="clearfix"> </div>


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
