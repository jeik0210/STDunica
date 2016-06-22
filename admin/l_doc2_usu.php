<?php
 		session_start();
		
		//INICIAMOS LA VARIABLE SESIONADA AREA
		
		$sarea=$_SESSION['area'];
		
		include('../admin/php_conexion.php'); 
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
				$sql="UPDATE flujo SET estado='$estado' WHERE id=$codig ";
				mysql_query($sql);
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blanco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../admin/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../admin/css/docs.css" rel="stylesheet">
    <link href="../admin/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="../admin/js/jquery.js"></script>
    <script src="../admin/js/bootstrap-transition.js"></script>
    <script src="../admin/js/bootstrap-alert.js"></script>
    <script src="../admin/js/bootstrap-modal.js"></script>
    <script src="../admin/js/bootstrap-dropdown.js"></script>
    <script src="../admin/js/bootstrap-scrollspy.js"></script>
    <script src="../admin/js/bootstrap-tab.js"></script>
    <script src="../admin/js/bootstrap-tooltip.js"></script>
    <script src="../admin/js/bootstrap-popover.js"></script>
    <script src="../admin/js/bootstrap-button.js"></script>
    <script src="../admin/js/bootstrap-collapse.js"></script>
    <script src="../admin/js/bootstrap-carousel.js"></script>
    <script src="../admin/js/bootstrap-typeahead.js"></script>
    <script src="../admin/js/bootstrap-affix.js"></script>
    <script src="../admin/js/holder/holder.js"></script>
    <script src="../admin/js/google-code-prettify/prettify.js"></script>
    <script src="../admin/js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../admin/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../admin/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../admin/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../admin/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../admin/assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="right">
<form name="form1" method="post" action="">
	<a href="c_doc2_usu.php" class="btn btn-info"><i class="icon-user"></i> Nuevo Documento</a>
	<input type="text" name="bus" class="input-xlarge search-query" placeholder="N° de Expediente o N° Tramite">
	<button type="submit" class="btn btn-info"><i class="icon-search"></i> Buscar</button>
</form>
</div>
<table class="table table-hover" border="0">
  <thead>
  <tr>
    <td><strong></strong></td>
    <td><strong>N° Exp</strong></td>
    <td><strong>Estado</strong></td>
    <td><strong>N° Tramite</strong></td>
    <td><strong>Ingreso</strong></td>
    <td><strong>Hora</strong></td>
    <td><strong>N° Doc.</strong></td>
<td><strong>Dependencia</strong></td>
<td><strong>Asunto</strong></td>
<td><strong>Acciones</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php
 
  	if(empty($_POST['bus'])){
		$can=mysql_query("SELECT * FROM flujoe  ");
	}else{
		$buscar=$_POST['bus'];
		$can=mysql_query("SELECT * FROM flujoe where idexpediente LIKE '$buscar%' or tramite LIKE '$buscar%'");
	}
	$i=0;
	while($dato=mysql_fetch_array($can)){
		if($dato['estado']=="n"){
			$estado='<span class="label label-success ">Atendido</span>';
		}else{
			$estado='<span class="label label-important">Pendiente</span>';
			$i++;
		}
		
  ?>
  <tr>
    <td></td>
    <td><?php 
	//PARA MOSTRAR LOS DIAS TRANSCURRIDOS
	//$fecha_i=$dato['fecha'];
	//$fechaf=$dato['fechaf'];
	//$fecha_f=date("d-m-Y");
	//$diast=dias_transcurridos($fecha_i,$fecha_f);
	
	echo $dato['idexpediente']
	
	;
	/*
	if(!empty($fechaf))
	{
	if($diast<=1)
	{
	
	}
	else
	{
	if($diast<=5)	
	{
		echo $dato['idexpediente']." "."("."<font color='#FF6600'>"."<strong>".dias_transcurridos($fecha_i,$fechaf) ." "."Dias"."</font>"."</strong>".")"
	
	;
		}
		
		else
		{
			echo $dato['idexpediente']." "."("."<font color='#FF0000'>"."<strong>".dias_transcurridos($fecha_i,$fechaf) ." "."Dias"."</font>"."</strong>".")"
	
	;
			
			
			
			}
		
	}	
	

	}
	else
	{
		
		if($diast<=1)
	{
	echo $dato['idexpediente']." "."("."<font color='#0000FF'>"."<strong>".dias_transcurridos($fecha_i,$fecha_f) ." "."Dias"."</font>"."</strong>".")"
	
	;
	}
	else
	{
	if($diast<=5)	
	{
		echo $dato['idexpediente']." "."("."<font color='#FF6600'>"."<strong>".dias_transcurridos($fecha_i,$fecha_f) ." "."Dias"."</font>"."</strong>".")"
	
	;
		}
		
		else
		{
			echo $dato['idexpediente']." "."("."<font color='#FF0000'>"."<strong>".dias_transcurridos($fecha_i,$fecha_f) ." "."Dias"."</font>"."</strong>".")"
	
	;
			
			
			
			}
		
	}	
		
		}
		
				
		*/	

		
	
	 ?></td>
    <td><a href="../admin/l_doc2_usu.php?estado=<?php echo $dato['id']; ?>"><?php echo $estado; ?></a></td>
    <td><?php 
		
	
	
	echo $dato['tramite']; ?></td>
    <td><?php echo  $dato['fecha']; ?></td>
     <td><?php echo  $dato['hora']; ?></td>
    <td><?php 
	echo $dato['ndoc']; ?></td>
    <td><?php
	$dep=$dato['dependencia'];
	$sql="select * from dependencia where codigo='$dep'";
$query=mysql_query($sql);
$fila=mysql_fetch_array($query);
	
	
	
	
	 echo  $fila['nombre']; ?></td>
    <td><?php echo  $dato['asunto']; ?></td>
    <td><a href="c_doc2_usu.php?id=<?php echo $dato['id']; ?>" title="Editar Documento" class="btn btn-info"><i class="icon-pencil"></i></a></td>
  </tr>
  <?php } ?>
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