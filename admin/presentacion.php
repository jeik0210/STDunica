<?php

 		//session_start();
		include_once('php_conexion.php'); 
		//include_once('class/funciones.php');
		/*
		//include_once('class/class.php');
		//if($_SESSION['tipo_usu']=='a'){
		}else{
			header('location:error.php');
		}
		
		$usuario=limpiar($_SESSION['username']);
		$objUsuario=new Consultar_Profesor($usuario);
		$nombre=$objUsuario->consultar('nombre');
		$nombre=ucwords(strtolower($nombre));
		
		$can=mysql_query("SELECT COUNT(nombre)as numero FROM profesor");
		if($dato=mysql_fetch_array($can)){
			$n_profesor=$dato['numero'];
		}
		$can=mysql_query("SELECT COUNT(nombre)as numero FROM materias");
		if($dato=mysql_fetch_array($can)){
			$n_materias=$dato['numero'];
		}
		$can=mysql_query("SELECT COUNT(nombre)as numero FROM alumnos");
		if($dato=mysql_fetch_array($can)){
			$n_alumno=$dato['numero'];
		}
		*/
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

    <div class="row-fluid" align="center">
        <div class="span4">
        	<h3 align="center">Documentos Recibidos</h3>
            <img src="img/carrera.png" style="width: 200px; height: 200px;" title="Profesores"><br>
            <?php
			$query=mysql_query("select * from expediente");
			$filas=mysql_num_rows($query);
			$query2=mysql_query("select * from flujo where estado='n'");
			$filas2=mysql_num_rows($query2);
			 ?>
            
            <p><h3>Registrados: <?php echo "<font color='#FF0000'>".$filas."</font>" ?> </h3></p>
            <p><h3>Atendidos: <?php echo "<font color='#FF0000'>".$filas2."</font>" ?> </h3></p>
            <a href="c_doc.php" class="btn btn-large btn-block btn-primary" type="button"><strong>INGRESAR</strong></a>
        </div>
      <div class="span4">
        	<h3 align="center">Documentos Emitidos</h3>
            <img src="img/busqueda.png" style="width: 200px; height: 200px;" title="Materias"><br>
            
             <?php
			$query=mysql_query("select * from expedientee");
			$filas=mysql_num_rows($query);
			$query2=mysql_query("select * from flujoe where estado='n'");
			$filas2=mysql_num_rows($query2);
			 ?>
            
           <p> <h3>Registrados: <?php echo "<font color='#FF0000'>".$filas."</font>" ?></h3></p>
            <p><h3>Atendidos: <?php echo "<font color='#FF0000'>".$filas2."</font>" ?> </h3></p>
            <a href="c_doc2.php" class="btn btn-large btn-block btn-primary" type="button"><strong>INGRESAR</strong></a>
        </div>
        <div class="span4">
        	<h3 align="center">Seguimiento</h3>
            <img src="img/pro.png" style="width: 200px; height: 200px;" title="Alumnos"><br>
            <h3>Listados: </h3><br>
            <br>
            <a href="s_doc.php" class="btn btn-large btn-block btn-primary" type="button"><strong>INGRESAR</strong></a>
        </div>
    </div>
</body>
</html>