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
        <title>Buscar Paciente</title>
    </head>
    <body>
             <?php
    session_start();
//  session_destroy();


    if ($_SESSION['id'] != NULL && $_SESSION['rol'] == 3) {
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
        
        include '../template/menu.php';
        ?>
        <div id="" class="">
            <div class="content-main">

                <div class="banner1">
                    <h2>
                        <a href="../../citas/consultar/inicio.php">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                        <span>Consultar Reporte</span>

                    </h2>
                </div>



                <div class="validation-system">

                    <div class="validation-form">

                        <div class="col-md-12">


                            <form  id="formulario" method="post" action="../../controladores/administradorControlador.php">
                                
                                <div class="col-md-6 form-group form-last group-text ">

                                    <label class="control-label">De</label>
                                    <br>
                                    <input class="form-control" type="date" placeholder="Fecha" id="numerodoc" name="fechaSolicitud" class="form-control" required="true">
                                
                                </div>
                                <label class="control-label">Hasta</label>
                                    <br>
                                    <input class="form-control" type="date" placeholder="Fecha" id="numerodoc" name="fechaSolicitud" class="form-control" required="true">
                                <div class="clearfix"></div>
                                <div class="col-md-6 form-group">
                                    <input type="submit" class="btn btn-primary" id="consultar" name='consultar' value="Consultar"/>

                                </div>
                            </form>

                            
                            </div>
                        
                            <div class="form-group">

                                <div class="clearfix"> </div>

                            </div>
                    





                        </div>
                        <div class="clearfix"> </div>



                    </div>
                    <div class="clearfix"> </div>
                    <div class="clearfix"> </div>


                </div>
                <div class="clearfix"> </div>
            </div>

            
    </body>
    <?php
            include '../vistaadministrador/template/footer.php';
            include '../vistaadministrador/template/script.php';
            ?>
     <?php
    } else {
        header("Location:../../../index.php");
    }
    ?>
    
</html>

