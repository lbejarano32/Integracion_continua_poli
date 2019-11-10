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
        <title>Exste</title>
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
                            <span>Confirmacion.</span>
                        </h2>
                    </div>

                    <div class="validation-system">

                        <div class="validation-form">


                            <br>

                            <h2 align="center">Su cita ha sido agendada</h2>
                            
                            <br>
                            
                            <div class="clearfix"></div>
                            
                            <div class="col-md-12">
                                <div class="col-md-5"></div>
                                <div class="col-md-1">
                                    <form name="Volver" action="../../../vistas/citas/consultar/inicio.php" method="POST"> 
                                <input type="submit" value="Aceptar" class="btn btn-primary"> 
                            </form> 
                                </div>
                          
                            </div>

                            <div class="clearfix"></div>
                            <br>

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