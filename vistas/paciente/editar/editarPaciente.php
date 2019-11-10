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
        <title>Editar Paciente</title>
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
        ?>

        <div id="" class="">
            <div class="content-main">

                <div class="banner1">
                    <h2>
                        <a href="../../citas/consultar/inicio.php">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Actualizar Datos Paciente</span>
                    </h2>
                </div>  
                <div class="validation-system">

                    <div class="validation-form">
                        <?php
                        require '../../../modelo/com.sanident.modeloDao/pacienteDao.php';
                        include '../../../utilidades/Conexion.php';
                        if ($_GET['documento'] != NULL) {
                            $pDao = new pacienteDao();
                            $paciente = $pDao->buscarPaciente($_GET['documento']);

                            if (!empty($paciente)) {
                                foreach ($paciente as $pa) {
                                    ?>  

                                    <form  id="formulario" action="../../../controladores/pacienteControlador.php" method="GET">
                                        <input value="<?php echo $pa['id'];?>" name="idPaciente" hidden="true">

                                        <h3 align="center" style="font-family:sans-serif">Actualizar Datos Paciente</h3>
                                        <br>

                                        <div class="form-group">


                                            <div class="col-md-6 form-group2 group-text">
                                                <label class="control-label" for="nombrec">Nombres</label>
                                                

                                                <input  style="background-color: #E6E6E6" type="text" required value="<?php echo $pa['nombres'] ?>" id="nombreusu" name="nombre" class="form-control1" disabled="true" >
                                            </div>

                                            <div class="col-md-6 form-group2 form-last group-text">
                                                <label class="control-label">Apellidos</label>
                                                <input  style="background-color: #E6E6E6" class="form-control1"  type="text" required value="<?php echo $pa['apellidos']; ?>" id="apellidousu" name="apellido" class="form-control" disabled="true">
                                            </div>

                                            <div class="clearfix"> </div>
                                            <br>
                                            <div class="col-md-6 form-group2 group-number">
                                                <label class="control-label">Tipo de documento</label>

                                                <?php
                                                require '../../../modelo/com.sanident.modeloDao/tipodocumentoDao.php';

                                                $docDao = new tipodocumentoDao();
                                                $tipodocumento = $docDao->obtenerDocumento($pa['tipodocumento_id']);
                                                foreach ($tipodocumento as $tdocumento) {
                                                    ?>
                                                    <input  style="background-color: #E6E6E6" class="form-control1"  type="text" required value="<?php echo $tdocumento['nombre']; ?>" id="apellidousu" name="apellido" class="form-control" disabled="true">

                                                <?php }
                                                ?>


                                            </div>

                                            <div class="col-md-6 form-group form-last group-text ">

                                                <label class="control-label">N°Documento</label>
                                                <br>

                                                <input style="background-color: #E6E6E6"class="form-control1" type="number" required value="<?php echo $pa['documento'] ?>" id="numerodoc" name="documento">
                                            </div>
                                        </div>

                                        <br>	

                                        <div class="col-md-6 form-group ">
                                            <label class="control-label ">Fecha Nacimiento</label>
                                            <input style="background-color: #E6E6E6" class="form-control1 ng-invalid ng-invalid-required" required value="<?php echo $pa['fecha_nacimiento'] ?>" id="fechanacimiento" name="fechanacimiento">
                                        </div>	

                                        <div class="col-md-6 form-group ">
                                            <label class="control-label ">Lugar de nacimiento</label>

                                            <?php
                                            require '../../../modelo/com.sanident.modeloDao/ciudadDao.php';

                                            $ciuDao = new ciudadDao();
                                            $ciudad = $ciuDao->obtenerCiudad($pa['ciudades_id']);
                                            foreach ($ciudad as $ciudadd) {
                                                ?>
                                                <input style="background-color: #E6E6E6" class="form-control1" type="text" required value="<?php echo $ciudadd['nombre'] ?>" id="ciudad" name="ciudad" disabled="true">

                                            <?php }
                                            ?>

                                        </div>	

                                        <div class="form-group">

                                            <div class="col-md-6 form-group2 group-mail">
                                                <label class="control-label" required="" >Genero</label>
                                                <input  style="background-color: #E6E6E6" class="form-control1" type="text" required value="<?php echo $pa['genero'] ?>" id="genero" name="genero" disabled="true">

                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">E-mail</label>
                                                <input type="email"  id="email" name="correoelectronico" class="form-control1 ng-invalid ng-invalid-required" value="<?php echo $pa['correoElectronico']?>">
                                            </div>

                                            <br>
                                            <div class="clearfix"> </div>

                                            <div class="col-md-6 form-group1 group-mail">
                                                <label for="tel" class="control-label">Teléfono Fijo</label>
                                                <input type="text"  id="tel" name="telefonofijo" required="" value="<?php echo $pa['telefono_fijo'] ?>">
                                            </div>

                                            <div class="col-md-6 form-group1">
                                                <label class="control-label">Teléfono Celular</label>
                                                <input type="text" id="cel" name="telefonomovil" required="" value="<?php echo $pa['telefono_movil'] ?>">
                                            </div>

                                            <div class="clearfix"> </div>


                                            <div class="col-md-6 form-group2 ">
                                                <label class="control-label">Estado Civil</label>
                                                <select class="form-control1" name="estadocivil">
                                                    <?php
                                                    require '../../../modelo/com.sanident.modeloDao/estadocivilDao.php';

                                                    $ecDao = new estadocivilDao();
                                                    $estadocivil = $ecDao->obtenerestadocivil($pa['estadocivil_id']);

                                                    foreach ($estadocivil as $civil) {
                                                        ?>
                                                    <option name="estadocivil" value="<?php echo $civil['id'] ?>"><?php echo $civil['nombre'] ?></option>

                                                    <?php }
                                                    ?>

                                                    <?php
                                                    $ecDao = new estadocivilDao();
                                                    $allcivil = $ecDao->listarestadocivil();
                                                    foreach ($allcivil as $civil) {
                                                        ?>
                                                        <option name="estadocivil" value="<?php  echo $civil['id']?>"  ><?php  echo $civil['nombre']?> </option>
                                                    <?php }
                                                    ?>

                                                </select>
                                            </div>


                                            <div class="col-md-6 form-group2">
                                                <label class="control-label">Tipo de Afiliacion</label>
                                                <select name="afiliacion">

                                                    <option name="afiliacion"value="<?php echo $pa['tipo_afiliacion'] ?>"><?php echo $pa['tipo_afiliacion'] ?></option>
                                                    <option value="Ninguna" name="afiliacion">Ninguna</option>
                                                    <option value="Cotizante" name="afiliacion">Cotizante</option>
                                                    <option value="Beneficiario" name="afiliacion">Beneficiario</option>       
                                                </select>
                                            </div>

                                            <div class="clearfix"> </div>

                                            <div class="col-md-6 form-group1">
                                                <label class="control-label">Eps</label>
                                                <input type="text" id="eps" name="eps" required="" value="<?php echo $pa['eps'] ?>">
                                            </div>

                                            <div class="col-md-6 form-group2">
                                                <label class="control-label">Rh</label>
                                                <input  style="background-color: #E6E6E6" type="text" value="<?php echo $pa['rh'] ?>" id="rh" name="rh" class="form-control1" disabled="true" >

                                            </div>
                                            <div class="clearfix"> </div>

                                          

                                            <div class="clearfix"></div><br>

                                            <input type="submit" class="btn btn-primary" name="modificarPaciente"/>

                                            <div class="clearfix"> </div>

                                        </div>


                                    </form>
                                    <?php
                                }
                            }
                        }
                        ?>


                        <div class="col-md-6 form-group">




                        </div>
                    </div>

                </div>
                <div class="clearfix"> </div>

            </div>
            <div class="clearfix"> </div>
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