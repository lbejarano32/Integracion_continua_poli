<?php 
require '../../../modelo/com.sanident.modeloDao/pacienteDao.php';
require '../../../modelo/com.sanident.modeloDao/odontologoDao.php';
include '../../../utilidades/Conexion.php';

$pacienteDao = new pacienteDao();
$odontologoDao = new odontologoDao();
$paciente = $pacienteDao->buscarPacienteid($_GET['id']);
foreach ($paciente as $pac){
    $dest = $pac['correoElectronico'];
}

$doctor = $odontologoDao->buscarOdontologoid($_GET['odontologo']);
foreach ($doctor as $doc){
    $ndoctor = $doc['nombres'];
    $adoctor = $doc['apellidos'];
}

$destinatario = $dest;
$fecha = $_GET['fecha'];
$odontologo = $_GET['odontologo'];
$hora = $_GET['hora'];
//$contraseña = $_GET['clave'];
$asunto = "Su cita ha sido cancelada"; 
$cuerpo = '
    
<html> 
<head> 
<meta charset="utf-8">
   <title>Su cita ha sido cancelada</title>
   <link rel="shortcut icon" href="resources/images/logo.png" type="images/logo.png" />
</head> 
<body> 
<img src="http://deffe.com/images/2017/05/25/logo.png"/>
<p> 
<b> Su cita: </b>


</body>
'; 

$cuerpo .= '<br><b>Hora: </b>'.$hora;
$cuerpo .= '<br><b>Fecha: </b>'.$fecha;


$cuerpo .='<b>Ha sido cancelada</b>';




//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Sanident<proyecto.saniweb@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
header("Location: ../inicio.php?cancelado");

?>  