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
        <title>Editar Doctor</title>

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


            <?php
            include './template/menu.php';
            ?>

            <div id="" class="">

                <div class="validation-system">

                    <div class="validation-form">
                        <?php
                        require '../../modelo/com.sanident.modeloDao/tipodocumentoDao.php';
                        require '../../modelo/com.sanident.modeloDao/odontologoDao.php';
                        require '../../modelo/com.sanident.modeloDao/estadousuarioDao.php';
                        require '../../modelo/com.sanident.modeloDao/ciudadDao.php';
                        require '../../modelo/com.sanident.modeloDao/estadocivilDao.php';
                        require '../../modelo/com.sanident.modeloDto/estadocivilDto.php';
                        require '../../utilidades/Conexion.php';
                        $ecDao = new estadocivilDao();
                        $ciuDao = new ciudadDao();
                        $euDao = new estadousuarioDao();
                        $tdDao = new tipodocumentoDao();
                        $oDao = new odontologoDao();
                        $odontologo = $oDao->buscarOdontologodocumento($_GET['documento']);
                        foreach ($odontologo as $odo) {
                            ?>

                            <form action = "../../controladores/odontologoControlador.php" method = "GET">

                                <h3 align = "center" style = "font-family:sans-serif">Editar Odontólogo</h3>
                                <br>
                                <input hidden="true" name="idOdontologo" value="<?php echo $odo['id'] ?>"/>
                                <div class = "form-group">
                                    <div class = "col-md-6 form-group2 group-text">
                                        <label class = "control-label" for = "nombrec">Nombres</label>
                                        <input disabled="true" type = "text" placeholder = "<?php echo $odo['nombres'] ?>" id = "nombreusu" name = "nombre" class = "form-control1" style="background-color:gainsboro">
                                    </div>
                                    <div class = "col-md-6 form-group2 form-last group-text">
                                        <label class = "control-label">Apellidos</label>
                                        <input class = "form-control1" type = "text" placeholder = "<?php echo $odo['apellidos'] ?>" id = "apellidousu" name = "apellido" class = "form-control" disabled="true" style="background-color:gainsboro" >
                                    </div>
                                </div>


                                <br>
                                <div class = "col-md-6 form-group2 group-number">
                                    <label class = "control-label">Tipo de documento</label>
                                    <?php
                                    $tipodocumento = $tdDao->obtenerDocumento($odo['tipodocumento_id']);
                                    foreach ($tipodocumento as $tdocumento) {
                                        ?>

                                        <input class = "form-control1" type = "text" placeholder= "<?php echo $tdocumento['nombre']; ?>" id= "tipoDocumento" name = "tipoDocumento" disabled="true" style="background-color:gainsboro"/>
                                    <?php } ?>
                                </div>



                                <div class="col-md-6 form-group form-last group-text ">

                                    <label class="control-label">N°Documento</label>
                                    <br>

                                    <input class="form-control1" type="number" value="<?php echo $_GET['documento']; ?>" placeholder="<?php echo $_GET['documento']; ?>" id="numerodoc" name="documento" disabled="true" style="background-color:gainsboro">
                                </div>



                                <br>

                                <div class="col-md-6 form-group ">
                                    <label class="control-label ">Fecha Nacimiento</label>
                                    <input class="form-control1 ng-invalid ng-invalid-required" type="text" placeholder="<?php echo $odo['fecha_nacimiento'] ?>" id="fechanacimiento" name="fechanacimiento"disabled="true" style="background-color:gainsboro">
                                </div>

                                <div class="col-md-6 form-group ">
                                    <label class="control-label ">Lugar de nacimiento</label>
                                    <?php
                                    $ciudad = $ciuDao->obtenerCiudad($odo['ciudades_id']);
                                    foreach ($ciudad as $ciu) {
                                        ?>
                                        <input class="form-control1 ng-invalid ng-invalid-required" type="text" placeholder="<?php echo $ciu['nombre'] ?>" id="fechanacimiento" name="ciudad" disabled="true" style="background-color:gainsboro">
                                    <?php } ?>
                                </div>


                                <br>

                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label" required="" >Género</label>
                                    <input class="form-control1 ng-invalid ng-invalid-required" type="text"  placeholder="<?php echo $odo['genero'] ?>" id="genero" name="genero" disabled="true" style="background-color:gainsboro">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="control-label">E-mail</label>
                                    <input type="email" value="<?php echo $odo['correoElectronico'] ?>" id="email" name="correo" required="" class="form-control1 ng-invalid ng-invalid-required">
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 form-group2 group-mail">
                                    <label for="tel" class="control-label">Teléfono Fijo</label>
                                    <input class="form-control1"type="number" pattern="[0-9]{7}"  value="<?php echo $odo['telefono_fijo'] ?>" id="tel" name="telefonofijo" required="">
                                </div>

                                <div class="col-md-6 form-group1 group-mail">
                                    <label class="control-label">Teléfono Celular</label>
                                    <input type="text" value="<?php echo $odo ['telefono_movil'] ?>" id="cel" name="telefonomovil" required="">
                                </div>


                                <br>

                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label">Estado Civil</label>
                                    <select class="form-control1" name="estadocivil">
                                       
                                        <?php
                                        $allcivil = $ecDao->listarestadocivil();
                                        foreach ($allcivil as $civil) {
                                            ?>
                                            <option name="estadocivil" value="<?= $civil['id'] ?>" > <?php echo $civil['nombre']; ?>   </option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-md-6 form-group1 group-mail">
                                    <label class="control-label">Especialidad</label>
                                    <input type="text" value="<?php echo $odo['especialidad'] ?>" id="especialidad" name="especialidad" required="">
                                </div>

                                <div class = "clearfix"> </div>

                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label">Tarjeta Profesional</label>
                                    <input class="form-control1"type="text"  value="<?php echo $odo['tarjeta_profesional'] ?>" id="tarjeta" name="tarjetaProfesional" disabled="true" style="background-color: gainsboro">
                                </div>

                                <div class="col-md-6 form-group2 group-mail">
                                    <label class="control-label">Estado</label>
                                    <select class="form-control1" name="estadousuario">


                                        <?php
                                        $euDao = new estadousuarioDao();
                                        $allestadousuario = $euDao->listarestadousuario();
                                        foreach ($allestadousuario as $estadousuarios) {
                                            ?>
                                            <option name="estadousuario" value="<?= $estadousuarios['id'] ?>" > <?php echo $estadousuarios['nombre']; ?>   </option>
                                        <?php }
                                        ?>

                                    </select>
                                </div>

                                <div class = "clearfix"> </div>

                                <input type="submit" class="btn btn-primary" name="editarOdontologo"/>

                                <div class="clearfix"> </div>

                            </form>
                            <?php
                        }
                        ?>
                    </div>

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
