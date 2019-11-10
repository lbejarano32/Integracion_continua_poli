<?php
include '../../../utilidades/Conexion.php';
require '../../../modelo/com.sanident.modeloDao/reporteCitaDao.php';
$rcitaDao = new reporteCitaDao();
$agendada = $rcitaDao->reporteAgendada();
$cancelada = $rcitaDao->reporteCancelada();
$reagendada = $rcitaDao->reporteReagendada();
?>
<!DOCTYPE html>

<html>
     <head>
        <?php include '../../template/head.php'; ?>
        <meta charset="UTF-8">
        <title>Reportes</title>
    </head>
    <body>            <?php
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
                        <span>Reportes</span>

                    </h2>
                </div>
        <form>
            <div id="container" style="width: 100%;"></div>
        </form>
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
    
    <script src="../../../resources/js/highcharts.js"></script>
    <script src="../../../resources/js/highcharts-3d.js"></script>
    <script src="../../../resources/js/jquery.min.js"></script>
    <script src="../../../resources/js/exporting.js"></script>
    <script>

        Highcharts.chart('container', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: 'Detalle Citas Año 2017'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.percentage:.1f}%</b>'
                    }
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Estado Citas',
                    data: [

                        ['Agendada',<?php
        foreach ($agendada as $ag) {
            echo $ag['Agendadas'];
        }
        ?>],
                        ['Reagendada',<?php
        foreach ($reagendada as $rag) {
            echo $rag['reagendadas'];
        }
        ?>],
                        ['Cancelada', <?php
        foreach ($cancelada as $can) {
            echo $can ['Canceladas'];
        }
        ?>]


                    ]
                }]
        });
    </script>

</html>




