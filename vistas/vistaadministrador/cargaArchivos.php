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
        <title>Carga de Datos</title>
        <?php
        if (isset($_GET['subidaExitosa'])) {
            ?>
            <script languaje="javascript" type="text/javascript">
                alert("¡Los datos han sido cargados de manera exitosa!");
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
            <?php
            include './template/menu.php';
            ?>

            <form action="../../controladores/insertarControlador.php" enctype="multipart/form-data" method="post">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                    
                <br>
                <br>
                <input id="archivo" accept=".csv" name="archivo" type="file" /> 
                
                <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
                <br>
                <br>
                
                <input type="submit" class="btn btn-primary" name="insertarCiudades" value="Importar"/>
                </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                 <br>
                <br>
                <br>
                <br>
                <br>
                
                  
                
            </form>

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




