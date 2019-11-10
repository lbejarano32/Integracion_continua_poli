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
        <title>Registrar Paciente</title>
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

        <?php
        require '../../../modelo/com.sanident.modeloDao/pacienteDao.php';
        require '../../../modelo/com.sanident.modeloDto/usuarioDto.php';
        include '../../../utilidades/Conexion.php';
        $pacDao = new pacienteDao();
        $usuDto = new usuarioDto();

        $paciente = $pacDao->buscarPacienteid($_GET['id']);
        if (!empty($paciente)) {
            foreach ($paciente as $pa) {
                ?>
                <div class="content-main">

                    <div class="banner1">
                        <h2>
                            <a href="../../citas/consultar/inicio.php">Inicio</a>
                            <i class="fa fa-angle-right"></i>
                            <span>Consultar Paciente</span>
                        </h2>
                    </div>
                    <div class="validation-system">

                        <div class="validation-form">
                            
                            
                            <h2 align="center">Paciente</h2>
                            <h3 align ="center"><?php echo $pa['nombres']; echo ' '; echo $pa['apellidos'];?></h3>
                            <br>
                            


                            <div>

                                <form  id="formulario">
                                    <input hidden="true"name="idusuario" value="<?php echo $pa['id']; ?>"
                                           <div class="form-group">
                                        <div class="col-md-4"></div>
                                        

                                        <div class="clearfix"> </div>
                                        <br>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-3 form-group2 group-number">
                                            <label style="color:#3FB5C4" class="control-label">Tipo de documento:</label>

                                            <?php
                                            require '../../../modelo/com.sanident.modeloDao/tipodocumentoDao.php';

                                            $docDao = new tipodocumentoDao();
                                            $tipodocumento = $docDao->obtenerDocumento($pa['tipodocumento_id']);
                                            foreach ($tipodocumento as $tdocumento) {
                                                ?>
                                                <h4><?php echo $tdocumento['nombre']; ?></h4>

                                            <?php }
                                            ?>

                                        </div>

                                        <div class="col-md-3 form-group form-last group-text ">

                                            <label style="color:#3FB5C4" class="control-label">N°Documento</label>
                                            <br>
                                            <h4><?php echo $pa['documento'] ?></h4>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="col-md-4"></div>
                                        <div class="col-md-3 form-group ">
                                            <label style="color:#3FB5C4" class="control-label ">Fecha Nacimiento</label>
                                            <h4><?php echo $pa['fecha_nacimiento'] ?></h4>
                                        </div>	

                                        <div class="col-md-3 form-group ">
                                            <label style="color:#3FB5C4" class="control-label ">Lugar de nacimiento</label>

                                            <?php
                                            require '../../../modelo/com.sanident.modeloDao/ciudadDao.php';

                                            $ciuDao = new ciudadDao();
                                            $ciudad = $ciuDao->obtenerCiudad($pa['ciudades_id']);
                                            foreach ($ciudad as $ciudadd) {
                                                ?>
                                                <h4><?php echo $ciudadd['nombre'] ?></h4>

                                            <?php }
                                            ?>

                                        </div>	

                                        <div class="form-group">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3 form-group2 group-mail">
                                                <label style="color:#3FB5C4" class="control-label" required="" >Genero</label>
                                                <h4><?php echo $pa['genero'] ?></h4>

                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label style="color:#3FB5C4" class="control-label">E-mail</label>
                                                <h4><?php echo $pa['correoElectronico']; ?></h4>
                                            </div>

                                            <br>
                                            <div class="clearfix"> </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3 form-group1 group-mail">
                                                <label style="color:#3FB5C4" for="tel" class="control-label">Teléfono Fijo</label>
                                                <h4><?php echo $pa['telefono_fijo']; ?></h4>

                                            </div>

                                            <div class="col-md-3 form-group1">
                                                <label style="color:#3FB5C4" class="control-label">Teléfono Celular</label>
                                                <h4><?php echo $pa['telefono_movil']; ?></h4>

                                            </div>

                                            <div class="clearfix"> </div>
                                            <br>    
                                            <div class="col-md-4"></div>

                                            <div class="col-md-3 form-group2 ">
                                                <label style="color:#3FB5C4" class="control-label">Estado Civil</label>

                                                <?php
                                                require '../../../modelo/com.sanident.modeloDao/estadocivilDao.php';

                                                $ecDao = new estadocivilDao();
                                                $estadocivil = $ecDao->obtenerestadocivil($pa['estadocivil_id']);

                                                foreach ($estadocivil as $civil) {
                                                    ?>
                                                    <h4><?php echo $civil['nombre']; ?></h4>

                                                <?php }
                                                ?>


                                            </div>


                                            <div class="col-md-3 form-group2">
                                                <label style="color:#3FB5C4" class="control-label">Tipo de Afiliacion</label>
                                                <h4><?php echo $pa['tipo_afiliacion'] ?></h4>
                                            </div>

                                            <div class="clearfix"> </div>
                                            <br>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3 form-group1">
                                                <label style="color:#3FB5C4" class="control-label">Eps</label>
                                                <h4><?php echo $pa['eps'] ?></h4>

                                            </div>

                                            <div class="col-md-3 form-group2">
                                                <label style="color:#3FB5C4" class="control-label">Rh</label>
                                                <h4><?php echo $pa['rh'] ?></h4>

                                            </div>
                                            <div class="clearfix"> </div>
                                            <br>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-3 form-group2 ">
                                                <label style="color:#3FB5C4" class="control-label">Estado Usuario</label>
                                                <?php
                                                require '../../../modelo/com.sanident.modeloDao/estadousuarioDao.php';
                                                $euDao = new estadousuarioDao();
                                                $estadousuario = $euDao->obtenerestadousuario($pa['estadousuarios_id']);
                                                foreach ($estadousuario as $eu) {
                                                    ?>
                                                    <h4><?php echo $eu['nombre']; ?> </h4>

                                                <?php }
                                                ?>
                                            </div>
                                           

                                            <div class="col-md-4"></div>

                                            <div class="clearfix"></div><br>

                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                        </form>
                                <form method="post" action="../../citas/consultar/inicio.php">
                                     <input type="submit" value="Aceptar" class="btn btn-primary" name="modificarEstado"/>
                                </form>
                    </div>
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
