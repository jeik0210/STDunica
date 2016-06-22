<?php
session_start();
include('php_conexion.php');

if(!$_SESSION['tipo_usu']=='a'){
	header('location:error.php');
}
$nombre='';$tipo='u';$usuario='';$con='';$folios='';
if(!empty($_GET['id'])){	
	$id=$_GET['id'];
	$can=mysql_query("SELECT * FROM expediente where id=$id");
	if($dato=mysql_fetch_array($can)){
		$nombre=$dato['idexpediente'];
		$area=$dato['area'];
		$fecha=$dato['fecha'];
		$hora=$dato['hora'];
		$tipodoc=$dato['tipodocumento'];
		$folios=$dato['folios'];
		$remite=$dato['remite'];
		$asunto=$dato['asunto'];
		$boton="Actualizar";					
	}
}else{
	$id='';
	$boton="Guardar";
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
  	<blockquote>
  		<a href="l_doc3.php" class="btn btn-info"><i class="icon-list-alt"></i> Ir Listado de Documentos</a>
  	</blockquote>
  	<div align="center">
  		<form name="form1" method="post" action="">
  			<table width="40%" border="0">
  				<tr>
  					<td colspan="3">
  						<?php
  						if(!empty($_POST['nombre'])){
  							$nombre=$_POST['nombre'];
  							$area=$_POST['area'];
  							$fecha=$_POST['fecha'];
  							$hora=$_POST['hora'];
  							$tipodocumento=$_POST['tipodoc'];
  							$folios=$_POST['folios'];
  							$remite=$_POST['remite'];
  							$asunto=$_POST['asunto'];
  							
  							if($boton=='Actualizar'){
  								$xSQL="Update expediente Set idexpediente='$nombre',area='$area',folios='$folios',remite='$remite',asunto='$asunto'
  								Where id=$id";
  								mysql_query($xSQL);
  								echo '<div class="alert alert-success">
  								<button type="button" class="close" data-dismiss="alert">X</button>
  								<strong>Documento!</strong> Actualizado con Exito
  							</div>';
  						}else{
  							$can=mysql_query("SELECT * FROM expediente where id='$id'");
  							if(!$dato=mysql_fetch_array($can)){
  								if (!preg_match("/\\s/", $usuario)){ 
  									
			//REGISTRAR DATOS DEL DOCUMENTO		
  									
					//TABLA EXPEDIENTE
  									$sql = "INSERT INTO expediente (idexpediente,area,fecha,hora,tipodocumento,folios,remite,asunto,estado) VALUES ('$nombre','$area','$fecha','$hora','$tipodocumento','$folios','$remite','$asunto','s')";
						//TABLA FLUJO
  									$sql2 = "INSERT INTO flujo (idexpediente,area,fecha,hora,tipodocumento,folios,remite,asunto,estado) VALUES ('$nombre','$area','$fecha','$hora','$tipodocumento','$folios','$remite','$asunto','s')";
  									
  									mysql_query($sql);
  									mysql_query($sql2);
  									$nombre='';$area='';$tipodoc='';$folios='';$remite='';$asunto='';
  									echo '	<div class="alert alert-success">
  									<button type="button" class="close" data-dismiss="alert">X</button>
  									<strong>Documento!</strong> Guardado con Exito
  								</div>';
  								
  								
  								
  								
  							}else{
  								echo '	<div class="alert alert-error">
  								<button type="button" class="close" data-dismiss="alert">X</button>
  								<strong>Error!</strong> No se permiten espacios.
  							</div>';
  							$usuario='';$con='';
  						}
  					}else{
  						echo '	<div class="alert alert-error">
  						<button type="button" class="close" data-dismiss="alert">X</button>
  						<strong>Error!</strong> Este documento ya existe.
  					</div>';
  					$usuario='';
  				}
  			}
  		}
  		?>
  	</td>
  </tr>
  <tr>
  	<td width="44%"><strong>N° Expediente</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($nombre)){ 
  			echo '<input type="text" name="nombre" id="nombre" value='.$nombre.' readonly>';
  		}else{
  			$query=mysql_query("select max(id) as id from expediente");
  			$fila=mysql_fetch_array($query);
  			$ultimo=$fila['id']+1;	



  			echo '<input type="text" name="nombre" id="nombre" value='.$ultimo.' readonly>';	
  		}
  		?>
  		
  		
  		
  		
  	</td>
  </tr>
  <tr>
  	<td><strong>Area</strong></td>
  	<td colspan="2">
  		
  		<?php 
  		if(!empty($area)){ 
  			echo '<input type="text" name="area" id="area" value='.$area.' readonly>';
  		}else{
  			
  			$query=mysql_query("select * from area order by nombre asc");
  			
  			echo "<select name='area' id='area' required>";
  			echo "<option value=''>Seleccionar...</option>";
  			while($fila=mysql_fetch_array($query))
  			{
  				echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
  				
  			}
  		}
  		?>
  		
  		
  	</td>
  </tr>
  <tr>
  	<td><strong>Fecha</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($fecha)){ 
  			echo '<input type="text" name="fecha" id="fecha" value='.$fecha.' readonly>';
  		}else{
  			$fecha=date("d-m-Y");
  			echo '<input type="text" name="fecha" id="fecha" value='.$fecha.' readonly>';	
  		}
  		?>
  		
  		
  		
  		
  		
  	</td>
  </tr>
  <tr>
  	<td><strong>Hora</strong></td>
  	<td colspan="2">
  		
  		<?php 
  		if(!empty($hora)){ 
  			echo '<input type="text" name="hora" id="hora" value='.$hora.' readonly>';
  		}else{
  			$hora=date("H:i:s");
  			echo '<input type="text" name="hora" id="hora" value='.$hora.' readonly>';	
  		}
  		?>
  	</td>
  </tr>
  
  <tr>
  	<td><strong> Tipo Documento</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($tipodoc)){ 
  			echo '<input type="text" name="tipodoc" id="tipodoc" value='.$tipodoc.' readonly>';
  		}else{
  			
  			
  			$query=mysql_query("select * from tipo_documento order by nombre asc");
  			
  			echo "<select name='tipodoc' id='tipodoc' required>";
  			echo "<option value=''>Seleccionar...</option>";
  			while($fila=mysql_fetch_array($query))
  			{
  				echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
  				
  			}
  		}
  		?>
  		
  		
  	</td>
  </tr>
  <tr>
  	<td><strong> Folios</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($folios)){ 
  			echo '<input type="text" name="folios" id="folios" value='.$folios.' required>';
  		}else{
  			echo '<select name="folios" required>
  			<option value="">Seleccionar....</option>
  			<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
  			<option value="6">6</option>
  			<option value="7">7</option>
  			<option value="8">8</option>
  			<option value="9">9</option>
  			<option value="10">10</option>
  			';	
  		}
  		?>	
  		
  		
  	</td>
  </tr>
  <tr>
  	<td><strong>Remitente</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($remite)){ 
  			echo '<input type="text" name="remite" id="remite" value='.$remite.' required>';
  		}else{
  			echo '<input type="text" name="remite" id="remite" required>';	
  		}
  		?>
  	</td>
  </tr>
  <tr>
  	<td><strong>Asunto</strong></td>
  	<td colspan="2">
  		<?php 
  		if(!empty($asunto)){ 
  			echo '<textarea name="asunto" id="asunto"  required>'.$asunto.'</textarea>';
  		}else{
  			echo '<textarea name="asunto" id="asunto"  required></textarea>';	
  		}
  		?>
  		
  		
  		
  		
  	</td>
  </tr>
  
  <tr>
  	<td></td>
  	<td colspan="2">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="2">
  		<button type="submit" class="btn btn-info"><i class="icon-ok"></i> <?php echo $boton; ?></button>    </td>
  		<td width="56%">
  			<?php if($boton=='Actualizar'){
  				echo '<button class="btn btn-info"><a href="c_doc.php"><i class="icon-ok"></i> Ingresar Nuevo</a></button>';
  			} ?>
  		</td>
  	</tr>
  	<tr>
  		<td colspan="2">&nbsp;</td>
  		<td>&nbsp;</td>
  	</tr>
  </table>
</form>
</div>
</body>
</html>