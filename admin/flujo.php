<?php
		
		include('php_conexion.php'); 
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Modulo de Detalle</title>
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
    
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />


	<script type="text/javascript">
$(document).ready(function() {
   $("#datepicker").datepicker();
});
	</script>
   
    
    <script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    
 
$(document).ready(function() {
   $("#datepicker").datepicker();
 });
</script>




    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

 <!--PARA EL FAVICON -->
    <link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon">
<link rel="icon" href="ico/favicon.ico" type="image/x-icon">



    <link rel="shortcut icon" href="ico/favicon.png">
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<form name="form1" method="post" action="">
<table width="90%" class="table table-hover" border="0">

  <?php
    $dato2=$_REQUEST['id'];
	$can=mysql_query("SELECT * FROM expediente where idexpediente
='$dato2'");
 
	while($dato=mysql_fetch_array($can)){
	
  ?>
  <tr>
  <td colspan="6" align="center" class="alert alert-success"><strong>DATOS GENERALES</strong></td>
    </tr>
    <tr height="5">
  <td colspan="6" align="center"></td>
    </tr>
 <tr>
    <td> <strong>INTERESADO:</strong></td>
     <td><?php /* echo  $dato['remite']; */?></td>
    <td><strong>TIPO:</strong></td>
      <td><?php   $tipo=$dato['tipodoc'];
	 $sql="select * from tipo_documento where id=$tipo";
	  $query=mysql_query($sql);
	  
	  $fila=mysql_fetch_array($query);
	   echo $fila['nombre']; ?></td>
       <td><strong>ASUNTO:</strong></td>
       <td><?php echo  $dato['asunto']; ?></td>
  </tr>
  <tr>
    <td><strong>FECHA:</strong></td>
    <td><?php echo  $dato['fecha']; ?></td>
    
    <td ><strong>HORA:</strong></td>
    <td><?php echo  $dato['hora']; ?></td>
    <td ><strong>ESTADO:</strong></td>
    <td><?php
	 $estado=$dato['estado'];
	 $sql="select * from estado where codigo='$estado'";
	  $query=mysql_query($sql);
	  $fila=mysql_fetch_array($query);
	
	
	 echo "<span class='label label-success'>".$fila['nombre']."</span> "; ?></td>
    </tr>
    <tr>
    <td><strong>OBSERVACION:</strong></td>
    <td colspan="5"><?php 
	  $area=$dato['area'];
	  $sql="select * from area where id=$area";
	  $query=mysql_query($sql);
	  $fila=mysql_fetch_array($query);
	 
	
echo "Estimado Usuario: El Expediente "."<strong>".$dato['idexpediente']."</strong>". " Ha sido ingreso por  "."<strong>".$fila['nombre']."</strong>"." el día "."<strong>".$dato['fecha']."</strong>"." a horas "."<strong>".$dato['hora']."</strong>"; 
	
	
	
	?></td>
    
   
    </tr>
   
  
  <?php }?>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</div>
<table class="table table-hover" border="0">
  <thead>
   <tr>
    <td class="alert alert-info"><strong>FLUJO DEL EXPEDIENTE</strong></td>
    
	
  </tr>
  
 <tr>
   
    <td><strong>N° Exp.</strong></td>
    <td><strong>Area</strong></td>
    <td><strong>Ingreso</strong> </td>
    <td><strong>Hora</strong></td>
    <td><strong>Documento</strong></td>
    <td><strong>Salida</strong></td>
    <td><strong>Hora</strong></td>
	<td><strong>N° Doc.</strong></td>
	<td><strong>Asunto</strong></td>
	
  </tr>
  </thead>
  <tbody>
  
<?php
    $dato2=$_REQUEST['id'];
	$can=mysql_query("SELECT * FROM flujo where idexpediente
='$dato2'");
 
	while($dato=mysql_fetch_array($can)){
	
  ?>
  <tr>
   
    <td><?php 
	$fecha_i=$dato['fecha'];
	$fecha_f=$dato['fechaf'];
		
	echo $dato['idexpediente'] /*."("."<font color='#FF0000'>".		dias_transcurridos($fecha_i,$fecha_f) ." "."Dias"."</font>".")"
	
	*/; ?></td>
      <td><?php 
	  $area=$dato['area'];
	  $sql="select * from area where id=$area";
	  $query=mysql_query($sql);
	  
	  $fila=mysql_fetch_array($query);
	  
	  echo $fila['nombre']; ?></td>
    <td><?php echo  $dato['fecha']; ?></td>
     <td><?php echo  $dato['hora']; ?></td>
    <td><?php   $tipo=$dato['tipodoc'];
	 $sql="select * from tipo_documento where id=$tipo";
	  $query=mysql_query($sql);
	  
	  $fila=mysql_fetch_array($query);
	   echo $fila['nombre']; ?></td>
    <td><?php echo  $dato['fechaf']; ?></td>
  <td><?php echo  $dato['horaf']; ?></td>
    <td><?php echo  $dato['ndoc']; ?></td>
    <td><?php echo  $dato['asunto']; ?></td>
    
  </tr>
  
  
  <?php }?>
  </tbody>
</table>
<?php
		
		function dias_transcurridos($fechai,$fechaf)
	{
	$dias	= (strtotime($fechai)-strtotime($fechaf))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
	}
	
	
	?>
</body>
</html>