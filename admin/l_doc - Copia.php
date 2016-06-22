<?php
 		session_start();
		
		include('php_conexion.php'); 
		if(!$_SESSION['tipo_usu']=='a'){
			header('location:error.php');
		}else{
			if(!empty($_GET['estado'])){
				$codig=$_GET['estado'];
				$cans=mysql_query("SELECT * FROM  expediente WHERE estado='s' and id=$codig");
				if($d=mysql_fetch_array($cans)){
					$estado='n';
				}else{
					$estado='s';
				}
				$sql="UPDATE expediente SET estado='$estado' WHERE id=$codig";
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
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="right">
<form name="form1" method="post" action="">
	<a href="c_doc.php" class="btn btn-info"><i class="icon-user"></i> Nuevo Documento</a>
	<input type="text" name="bus" class="input-xlarge search-query" placeholder="N° de Expediente">
	<button type="submit" name="boton" class="btn btn-info"><i class="icon-search"></i> Buscar</button>
</form>
</div>
<table class="table table-hover" border="0">
  <thead>
  <tr>
    <td><strong>N°</strong></td>
    <td><strong>N° Expediente</strong></td>
    <td><strong>Estado</strong></td>
    <td><strong>Area</strong></td>
    <td><strong>Fecha</strong></td>
    <td><strong>Hora</strong></td>
    <td><strong>Documento</strong></td>
<td><strong>Remite</strong></td>
<td><strong>Asunto</strong></td>
<td><strong>Acciones</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php
 if(isset($_POST['boton']))
	{
		$buscar=$_POST['bus'];
		$can=mysql_query("SELECT * FROM expediente where idexpediente LIKE '$buscar%'");
	
	$i=0;
	while($dato=mysql_fetch_array($can)){
		if($dato['estado']=="n"){
			$estado='<span class="label label-important">Inactivo</span>';
		}else{
			$estado='<span class="label label-success">Activo</span>';
			$i++;
		}
		
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $dato['idexpediente']; ?></td>
    <td><a href="l_doc3.php?estado=<?php echo $dato['id']; ?>"><?php echo $estado; ?></a></td>
    <td><?php echo $dato['area']; ?></td>
    <td><?php echo  $dato['fecha']; ?></td>
     <td><?php echo  $dato['hora']; ?></td>
    <td><?php echo  $dato['tipodocumento']; ?></td>
    <td><?php echo  $dato['remite']; ?></td>
    <td><?php echo  $dato['asunto']; ?></td>
    <td><a href="c_doc.php?id=<?php echo $dato['id']; ?>" title="Editar Documento" class="btn btn-info"><i class="icon-pencil"></i></a></td>
  </tr>
  <?php } }?>
  </tbody>
</table>

</body>
</html>