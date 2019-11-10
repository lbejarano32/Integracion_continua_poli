<?php
include '../../utilidades/Conexion.php';
require '../../modelo/com.sanident.modeloDao/administradorDao.php';
$radmDao = new administradorDao();
$cerrado = $radmDao->reporteCerrado();
$asignado = $radmDao->reporteAsignado();
?>
<!DOCTYPE html>

<html>
    <head >
<?php include './template/head.php'; ?>

        <meta charset="UTF-8">
        <title>Reporte Soporte</title>
    </head>
    <body>
        <form >
            <div id="container" style="width: 100%;"></div>
        </form>

    </body>

    <script src="../../resources/js/highcharts.js"></script>
    <script src="../../resources/js/highcharts-3d.js"></script>
    <script src="../../resources/js/jquery.min.js"></script>
    <script src="../../resources/js/exporting.js"></script>
    <br>
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
                text: 'ESTADO DE CITAS'
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
                    name: 'Estado Tickets',
                    data: [

                        ['Cerrados',<?php
foreach ($cerrado as $cer) {
    echo $cer['Cerrado'];
}
?>],
                        ['Asignados',<?php
foreach ($asignado as $as) {
    echo $as['Asignado'];
}
?>]



                    ]
                }]
        });
    </script>
    <br>
    <br>

    <?php
    include '../template/footer.php';
    ?>

</html>




