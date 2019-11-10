<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cancelar Cita</title>
        <?php include 'template/head.php'; ?>
        <meta charset="UTF-8">
        <script src="../../resources/jquery-ui-1.12.1.custom/external/jquery/jquery.js" type="text/javascript"></script>
        <link href="../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script> 
        <script src="../../resources/jquery-ui-1.12.1.custom/jquery-ui.js" type="text/javascript"></script>

        <title>Inicio</title>

    <a href="inicio.php"></a>


</head>
<body>
    <?php
    session_start();
//  session_destroy();


    if ($_SESSION['id'] != NULL && $_SESSION['rol'] == 2) {
        ?>


        <div class="header" id="move-top">
            <div class="container">
                <div class="header-left">
                    <div class="logo">
                        <img src="../../resources/images/logo4.png" width="120%" height="120%"/>


                    </div>
                </div>

                <div>

                    <ul class="header-right">
                        <li>						
                            <img src="../../resources/images/icon1.png" width="120%" height="120%"/>
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


        <?php include 'template/menu.php'; ?>

        <div class="content-main">

            <div class="banner1">
                <h2>
                    <a href="../../vistapaciente/inicio.php">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                    <span>Cancelar cita</span>
                </h2>
            </div>

            <div class="validation-system">

                <div class="validation-form">

                    <h3 align="center" style="font-family:sans-serif; color: #3FB5C4"><strong>Cancelar Cita</strong></h3>
                    <br>

                    <div class="validation-system">

                        <div class="validation-form">
                            <!---->


                            <?php
                            require '../../modelo/com.sanident.modeloDao/pacienteDao.php';
                            require '../../modelo/com.sanident.modeloDao/tipodocumentoDao.php';
                            require '../../modelo/com.sanident.modeloDao/citaDao.php';
                            include '../../utilidades/Conexion.php';
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
                                                <form id="formulario" method="POST" action="../../controladores/citaControlador.php">
                                                    <input name="id" value="<?php echo $cita['id'] ?>" hidden="true"/>
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

                                                <div class="col-md-12 form-group1">
                                                    <div class='col-md-2'>
                                                        <h3>Doctor:</h3>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <?php
                                                        require '../../modelo/com.sanident.modeloDao/odontologoDao.php';
                                                        $odoDao = new odontologoDao();

                                                        $dDao = new odontologoDao();
                                                        $cdoctor = $dDao->buscarOdontologoid($cita['personalodontologico_usuarios_id']);
                                                        
                                                        foreach ($cdoctor as $doctor) {
                                                            ?>
                                                            <h4><?php
                                                                echo $doctor['nombres'];
                                                                echo ' ';
                                                                echo $doctor['apellidos']
                                                                ?>  </h4>                                                           

                                                        <?php }
                                                        ?>


                                                    </div>
                                                </div>

                                                <div class="col-md-12 form-group1">
                                                    <div class='col-md-2'>
                                                        <h3>Tipo de Cita:</h3>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <h4><?php
                                                            echo $cita['especialidad'];
                                                            ?>  </h4> 
                                                    </div>
                                                </div>

                                                <input name="idpaciente" value="<?php echo $pa['id']; ?>" hidden="true">
                                                <input name="hora" value="<?php echo $cita['hora']; ?>" hidden="true">
                                                <input name="fecha" value="<?php echo $cita['fecha']; ?>" hidden="true">

                                                <div class="col-md-12 form-group1">
                                                    <div class='col-md-2'>
                                                        <h3>Fecha:</h3>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <h4><?php
                                                            echo $cita['fecha'];
                                                            ?>  </h4> 
                                                    </div>
                                                </div>



                                                <div class="col-md-12 form-group1">
                                                    <div class='col-md-2'>
                                                        <h3>Hora:</h3>
                                                    </div>
                                                    <div class='col-md-4'>
                                                        <h4><?php
                                                            echo $cita['hora'];
                                                            ?>  </h4> 
                                                    </div>
                                                </div>



                                                <div class="clearfix"> </div>
                                                <br

                                                    <div class="col-md-6 form-group1">
                                                    <input type="submit" class="btn btn-primary" name="cancelarCitap" value="Cancelar Cita"/>


                                                </div>

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
    include 'template/footer.php';
    include 'template/script.php';
    ?>
    <?php
} else {
    header("Location:../../index.php");
}
?>
</html>
