<?php
include("php_conexion3.php");
//mysql_connect("localhost","unica_espillco","63FPD9a3v5mQQEYT")or die("Mala conexion".mysql_error());
//mysql_select_db("unica_alumnos")or die("No se conecto a la base de datos".mysql_error());

$cab.= "Content-type: text; text/html\r\n";
$cab.= 'From: ogtic@unica.edu.pe';

$re=mysql_query("select * from docentes");
while($f=mysql_fetch_array($re)){
$para=$f['correo'];	
$nombres=$f['primero'];
$msj='
Estimado: '.$nombres.'

Mediante la presente le hacemos llegar un cordial saludo de parte de la Universidad y a la vez invitarlo asistir a la capacitación de uso e instalación de equipos multimedia a cargo de la empresa DATACONT SAC.

La capacitacion tendra lugar el dia 23 de enero del presente a las 9:00 AM en el Hotel LAS DUNAS RESORT, Salon Presidentes A.

Esperamos contar con su Grata Presencia.


Atte,

Oficina General de Tecnología Informatica y Comunicaciones
Universidad Nacional San Luis Gonzaga de Ica
';
mail($para,"INVITACION: CAPACITACION EN EL USO E INSTALACION DE PROYECTORES MULTIMEDIA",$msj,$cab);
echo $para.'<br>';
echo $msj.'<br><br>';
}
?>