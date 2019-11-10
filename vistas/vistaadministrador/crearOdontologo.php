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
        <script>
            $(function () {
                $('#txtDate').datepicker({
                    maxDate: -6570,
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-100:+0'

                });
            });
        </script>

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
                        require '../../modelo/com.sanident.modeloDto/tipodocumentoDto.php';
                        require '../../modelo/com.sanident.modeloDao/estadousuarioDao.php';
                        require '../../utilidades/Conexion.php';
                        ?>

                        <form  action = "../../controladores/odontologoControlador.php" method = "post">

                            <h3 align = "center" style = "font-family:sans-serif">Crear Odontólogo</h3>
                            <br>

                            <div class = "form-group">
                                <div class = "col-md-6 form-group2 group-text">
                                    <label class = "control-label" for = "nombrec">Nombres</label>
                                    <input required = "" type = "text" placeholder = "Nombre" id = "nombreusu" name = "nombre" class = "form-control1" >
                                </div>
                                <div class = "col-md-6 form-group2 form-last group-text">
                                    <label class = "control-label">Apellidos</label>
                                    <input class = "form-control1" type = "text" placeholder = "Apellido" id = "apellidousu" name = "apellido" class = "form-control" required = "">
                                </div>
                            </div>


                            <br>
                            <div class = "col-md-6 form-group2 group-number">
                                <label class = "control-label">Tipo de documento</label>
                                <select class = "form-control1" name = "tipodocumento">
                                    <option value = 0>Seleccione</option>
                                    <?php
                                    $docDao = new tipodocumentoDao();
                                    $alldocumento = $docDao->listarDocumento();
                                    foreach ($alldocumento as $tdocumento) {
                                        ?>
                                        <option name="tipodocumento" value="<?= $tdocumento['id'] ?>" > <?php echo $tdocumento['nombre']; ?>   </option>
                                    <?php }
                                    ?>

                                </select>
                            </div>


                            <div class="col-md-6 form-group form-last group-text ">

                                <label class="control-label">N°Documento</label>
                                <br>

                                <input class="form-control1" type="number"  placeholder="documento" id="numerodoc" name="documento">
                            </div>

                            <br>

                            <div class="col-md-6 form-group ">
                                <label class="control-label ">Fecha Nacimiento</label>
                                <input class="form-control1 ng-invalid ng-invalid-required" type="text" id="txtDate" placeholder="yyyy-mm-dd" id="fechanacimiento" name="fechanacimiento" required="">
                            </div>

                            <div class="col-md-6 form-group ">
                                <label class="control-label ">Lugar de nacimiento</label>
                                <select class="form-control1" name="ciudad">
                                    <option value=0>Seleccione</option>
                                    <?php
                                    require '../../modelo/com.sanident.modeloDao/ciudadDao.php';
                                    require '../../modelo/com.sanident.modeloDto/ciudadDto.php';

                                    $ciuDao = new ciudadDao();
                                    $allciudad = $ciuDao->listarCiudad();
                                    foreach ($allciudad as $ciudadd) {
                                        ?>
                                        <option name="ciudad" value="<?= $ciudadd['id'] ?>" > <?php echo $ciudadd['nombre']; ?>   </option>
                                    <?php }
                                    ?>

                                </select>
                            </div>


                            <br>

                            <div class="col-md-6 form-group2 group-mail">
                                <label class="control-label" required="" >Género</label>
                                <select name="genero">
                                    <option value="">Seleccione</option>
                                    <option value="Masculino" name="genero">Masculino</option>
                                    <option value="Femenino" name="genero">Femenino</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="control-label">E-mail</label>
                                <input type="email" placeholder="E-mail" id="email" name="correo" required="" class="form-control1">
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6 form-group2 group-mail">
                                <label for="tel" class="control-label">Teléfono Fijo</label>
                                <input class="form-control1"type="number" pattern="[0-9]{7}"  placeholder="Telefono Fijo" id="tel" name="telefonofijo" required="">
                            </div>

                            <div class="col-md-6 form-group1 group-mail">
                                <label class="control-label">Teléfono Celular</label>
                                <input type="text" placeholder="Celular" id="cel" name="telefonomovil" required="">
                            </div>


                            <br>

                            <div class="col-md-6 form-group2 group-mail">
                                <label class="control-label">Estado Civil</label>
                                <select class="form-control1" name="estadocivil">
                                    <option value=0>Seleccione</option>
                                    <?php
                                    require '../../modelo/com.sanident.modeloDao/estadocivilDao.php';
                                    require '../../modelo/com.sanident.modeloDto/estadocivilDto.php';

                                    $ecDao = new estadocivilDao();
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
                                <input type="text" placeholder="Especialidad" id="especialidad" name="especialidad" required="">
                            </div>

                            <div class = "clearfix"> </div>

                            <div class="col-md-6 form-group2 group-mail">
                                <label class="control-label">Tarjeta Profesional</label>
                                <input class="form-control1"type="text"  placeholder="Tarjeta Profesional" id="tarjeta" name="tarjetaProfesional" required="">
                            </div>

                            <div class = "clearfix"> </div>

                            <input type="submit" class="btn btn-primary" name="registroOdontologo"/>

                            <div class="clearfix"> </div>

                        </form>
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
