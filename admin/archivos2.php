<?php
 		
		session_start();
		
		$sarea=$_SESSION['area'];
		
		include('php_conexion.php'); 
		if(!$_SESSION['tipo_usu']=='a'){
			header('location:error.php');
		}else{
			if(!empty($_GET['estado'])){
				$codig=$_GET['estado'];
				$cans=mysql_query("SELECT * FROM  flujo WHERE estado='s' and id=$codig");
				if($d=mysql_fetch_array($cans)){
					$estado='n';
				}else{
					$estado='s';
				}
				$sql="UPDATE flujo SET estado='$estado' WHERE id=$codig";
				mysql_query($sql);
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Modulo de Consultas</title>
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
    
      <!--INSERTAR PARA EL FAVICON -->
    <link rel="shortcut icon" href="ico/favicon.ico" type="image/x-icon">
<link rel="icon" href="ico/favicon.ico" type="image/x-icon">



    <link rel="shortcut icon" href="ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
</div>
<table class="table table-hover" border="0">
  <thead>
    <tr>
      <td><strong>N°</strong></td>
      <td><strong>Expediente</strong></td>
      <td><strong>Area</strong></td>
      <td><strong>Ingreso</strong></td>
      <td><strong>Hora</strong></td>
      <td><strong>N° Doc.</strong></td>
      <td><strong>Salida</strong></td>
      <td><strong>Hora</strong></td>
      <td><strong>Detalles</strong></td>
       <td><strong>Estado</strong></td>
    </tr>
  </thead>
  <tbody>
    <?php
	 $dato2=$_REQUEST['id'];
	$can=mysql_query("SELECT * FROM flujo where idexpediente
='$dato2'");
 $i=0;
	while($dato=mysql_fetch_array($can)){
	$i++;
  ?>
    <tr>
      <td><?php echo $i; ?></td>
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
      <td><?php echo $dato['ndoc'];
	 ?></td>
      <td><?php echo  $dato['fechaf']; ?></td>
      <td><?php echo  $dato['horaf']; ?></td>
      <td><?php echo  $dato['descripcion']; ?></td>
       <td><?php $cod=$dato['estado'];
	  
	  

	  $sql="select * from estado where codigo='$cod'";
	  $query=mysql_query($sql);
	  $fila=mysql_fetch_array($query);
	  
	   echo "<span class='label label-success'>".$fila['nombre']."</span> "; 
	   
	    ?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<center>
<p><a href="javascript:window.history.go(-1);" title="Retornar" class="btn btn-info">REGRESAR</a></p>
</center>
<?php
		
		/*function dias_transcurridos($fechai,$fechaf)
	{
	$dias	= (strtotime($fechai)-strtotime($fechaf))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
	}
	*/
	
	?>
</body>
</html>