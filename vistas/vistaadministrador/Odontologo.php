<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include './template/head.php'; ?>
        <meta charset="UTF-8">
        <title>Inicio</title>

        <?php
        if (isset($_GET['Editado'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Odontologo modificado exitosamente");
            </script>

        <?php } ?>
            
             <?php
        if (isset($_GET['Registrado'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("Odontologo Registrado exitosamente");
            </script>

        <?php } ?>

    </head>
    <?php
    session_start();
//  session_destroy();


    if ($_SESSION['id'] != NULL && $_SESSION['rol'] == 3) {
        ?>

        <body>

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
                                <img src="../../resources/images/wo.jpg" width="120%" height="120%"/>
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
            <?php include './template/menu.php'; ?>
            <div class="content-main">

                <div class="banner1">
                    <h2>
                        <a href="../../vistas/vistaadministrador/inicio.php">Inicio</a>

                    </h2>
                </div>
                <div class="validation-system">

                    <div class="validation-form">

                        <h2 align="center">Odontólogos</h2>

                        <div class="clearfix"></div>
                        <?php
                        require '../../modelo/com.sanident.modeloDao/odontologoDao.php';
                        include '../../utilidades/Conexion.php';

                        $oDao = new odontologoDao();

                        $listadoctor = $oDao->listarOdontologo();
                        ?>

                        <div class = "clearfix"> </div>
                        <a href="crearOdontologo.php"> 
                            <input type="submit" class="btn btn-primary" value="crear nuevo"/></a>
                        <br><br>

                        <div class="clearfix"> </div>

                        <table class="table">
                            <thead>
                                <tr class="table-row">

                                    <th width="400">Documento</th>
                                    <th width="500">Nombre</th>
                                    <th width="500">Apellido</th>
                                    <th width="400">Telefono</th>
                                    <th width="500">Correo</th>                                            
                                    <th width="400">Opciones</th>
    <!--                                        <th width="400">Opciones</th>-->
                                </tr>
                            </thead>
                            </tbody>
                            <?php
                            if (!empty($listadoctor)) {
                                foreach ($listadoctor as $doctor) {
                                    ?>

                                    <tr>

                                        <td class="table-text">

                                            <h6><?php echo $doctor['documento']; ?></h6>

                                        </td>


                                        <td class="table-text">
                                            <h6><?php
                                                echo $doctor['nombres'];
                                                ?></h6>

                                        </td>

                                        <td class="table-text">
                                            <h6><?php echo $doctor['apellidos']; ?>
                                            </h6>
                                        </td>

                                        <td class="table-text">
                                            <h6><?php echo $doctor['telefono_movil']; ?>
                                            </h6>
                                        </td>


                                        <td class="table-text">
                                            <h6><?php echo $doctor['correoElectronico']; ?>
                                            </h6>
                                        </td>



                                        <td>

                                            <a href="../vistaadministrador/editarDoctor.php?documento=<?php echo $doctor['documento']; ?>"class="glyphicon glyphicon-pencil"></a>


                                    </tr>

                                    <?php
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


        </body>
        <?php
        include './template/footer.php';
        include './template/script.php';
        ?>
        <?php
    } else {
        header("Location:../../index.php");
    }
    ?>

</html>
