<?php 

$destinatario = $_GET['dest'];
$contraseña = $_GET['clave'];
$asunto = "Datos Actualizados"; 
$cuerpo = '
    
<html> 
<head> 
<meta charset="utf-8">
   <title>Notificacion</title>
   <link rel="shortcut icon" href="resources/images/logo.png" type="images/logo.png" />
</head> 
<body> 
<img src="http://deffe.com/images/2017/05/25/logo.png"/>
<h1 style="color: #2980B9">Bienvenido a Sanident!</h1> 
<p> 


</body>
Ha realizado su actualizacion de datos correctamente
 
 
';





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
header("Location: ../../vistas/citas/consultar/inicio.php?actualizado");

?>  