<?php
include("php_conexion2.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistema de Envio Masivo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    
    
     <!--PARA EL FAVICON -->
    <link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon">
<link rel="icon" href="ico/favicon.ico" type="image/x-icon">
    
    <link rel="shortcut icon" href="ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="50%" border="0">
      <tr>
        <td colspan="2"><strong><center>
       <div class="alert alert-success"><strong>FORMULARIO DE ENVIO</strong></div>
        </center></strong></td>
        </tr>
        <tr>
        <td colspan="2">
        <br>
        </td>
        </tr>
        <tr>
        <td colspan="2">
        <form action="" method="post" name="form1">
        	
        	<table class="table table-hover" border="0">
        	    <tr>
        <td width="31%"><strong>Documento N°</strong></td>
        <td width="69%"><input type="text" name="numdoc" id="numdoc"  autocomplete="off" placeholder="Ingresar N° Doc." onKeyUp="this.value=this.value.toUpperCase();" required></td>
      </tr>
      <tr>
        <td><strong>Remitente</strong></td>
        <td><input type="text" name="remitente" id="remitente" placeholder="Ingresar Remitente" onKeyUp="this.value=this.value.toUpperCase();" required  ></td>
      </tr>
      <tr>
        <td><strong>Destinatario</strong></td>
        <td><select name="destinatario" required>
        <option value="">Seleccionar...</option>
        <option value="1">ALUMNOS</option>
        <option value="2">DOCENTES</option>
        <option value="3">ADMINISTRATIVOS</option>
        </select></td>
      </tr>
      
      <tr>
        <td><strong>Asunto</strong></td>
        <td><input type="text" name="asunto" id="asunto" placeholder="Ingresar Asunto" onKeyUp="this.value=this.value.toUpperCase();" required></td>
      </tr>
      <tr>
        <td><strong>Contenido</strong></td>
        <td><textarea id="tenor" name="tenor" required></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" class="btn btn-info" name="enviar" id="enviar" value="ENVIAR"></td>
      </tr>
   	      	</table>
          </form>
          </td>
        </tr>
      
    </table>
    
    <?php
if(isset($_POST['enviar']))
{
	
	//CAPTURAR LOS DATOS DEL FORMULARIO
	
	$numdoc=$_POST['numdoc'];
	$remitente=$_POST['remitente'];
	//ES UN COMBO 1=ALUMNOS,2=DOCENTES,3=ADMINISTRATIVOS
	$destinatario=$_POST['destinatario'];
	$asunto=$_POST['asunto'];
	$tenor=$_POST['tenor'];
	//FECHA Y HORA
	$fecha=date("d-m-Y");
	$hora=date("H:i:s");

if(!empty($numdoc) and !empty($remitente) and !empty($destinatario) and !empty($asunto) and !empty($tenor)) 
{
// ALUMNOS
	if($destinatario==1)
	{

$cab.= "Content-type: text; text/html\r\n";
$cab.= 'From: espillcoquispejose@unica.edu.pe';

$re=mysql_query("select * from alumnos where numero='44049569'");
while($f=mysql_fetch_array($re)){
$para=$f['correo'];	
$nombres=$f['primero'];
$msj='



	Estimado(a): '.$nombres.'

Mensaje:

'.$tenor.'



Datos Adicionales:

Nro. Documento: '.$numdoc.'

Remite: '.$remitente.'

Destinatario: '.$destinatario.'

Asunto: '.$asunto.'

Fecha: '.$fecha.'

Hora: '.$hora.'




';
mail($para,"$asunto",$msj,$cab);
}
echo "<div class='alert alert-important'><strong>Se enviaron los datos con Exito!</strong></div>";

}
//DOCENTES
if($destinatario==2)
{
	$cab.= "Content-type: text; text/html\r\n";
$cab.= 'From: espillcoquispejose@unica.edu.pe';

$re=mysql_query("select * from docentes where numero='44049569'");
while($f=mysql_fetch_array($re)){
$para=$f['correo'];	
$nombres=$f['primero'];
$msj='



	Estimado(a): '.$nombres.'

Mensaje:

'.$tenor.'



Datos Adicionales:

Nro. Documento: '.$numdoc.'

Remite: '.$remitente.'

Destinatario: '.$destinatario.'

Asunto: '.$asunto.'

Fecha: '.$fecha.'

Hora: '.$hora.'




';
mail($para,"$asunto",$msj,$cab);
}
echo "<div class='alert alert-important'><strong>Se enviaron los datos con Exito!</strong></div>";
	
	}

//ADMINISTRATIVOS	
if($destinatario==3)
{
	$cab.= "Content-type: text; text/html\r\n";
$cab.= 'From: espillcoquispejose@unica.edu.pe';

$re=mysql_query("select * from administrativos where numero='44049569'");
while($f=mysql_fetch_array($re)){
$para=$f['correo'];	
$nombres=$f['primero'];
$msj='



	Estimado(a): '.$nombres.'

Mensaje:

'.$tenor.'



Datos Adicionales:

Nro. Documento: '.$numdoc.'

Remite: '.$remitente.'

Destinatario: '.$destinatario.'

Asunto: '.$asunto.'

Fecha: '.$fecha.'

Hora: '.$hora.'



';
mail($para,"$asunto",$msj,$cab);
}

	echo "<div class='alert alert-important'><strong>Se enviaron los datos con Exito!</strong></div>";
	}
}
else
{
	echo "<div class='alert alert-danger'><strong>No debe dejar campos vacios!</strong></div>";
	
	
	}


}


?>
</div>
<br>
<div class='alert alert-info' align="center"><strong>Desarrollado: Oficina General de Tecnología Informatica y Comunicaciones</strong></div>
</body>
</html>