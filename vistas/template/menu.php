<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

    </head>
    <body>
        <div class="container" style="width: 450px; padding: 1%;">

            <ul class="navi" >

                <li><a> Citas <span class="caret"></span>
                    </a>
                    <ul>  
                        <li><a href="../../citas/crear/buscarpaciente.php"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Agendar</a></li>
                        <li><a href="../../citas/consultar/consultar.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Consultar</a></li>
<!--                        <li><a href="cancelar_cita.html"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancelar</a></li>-->
                    </ul>
                </li>

                <li><a>Paciente <span class="caret"></span></a>
                    <ul>

                        <li><a href="../../paciente/crear/buscarPaciente.php"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Crear </a></li>
                        <li><a href="../../paciente/editar/buscarPaciente.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a></li>
                        <li><a href="../../paciente/listar/listar.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Cambiar Estado</a></li>
                    </ul>


                </li>
                
                <li><a>Reporte Citas <span class="caret"></span></a>
                    <ul>

                        <li><a href="../../reportes/reportesCitas/reportecitas.php"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Consultar </a></li>
                       
                    </ul>


                </li>


                <li><a>Opciones<span class="caret"></span></a>

                    <ul>
                        <li><a href="../../usuarios/editar/editarOdontologo.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar Perfil</a></li>
                        <li><a href="../../../logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar Sesion</a></li>

                    </ul>


                </li>
            </ul>
        </div>
    </body>
</html>
