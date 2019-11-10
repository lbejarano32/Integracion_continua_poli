<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    
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
    } 
    ?>

    
</html>

