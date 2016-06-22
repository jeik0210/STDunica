<?php
session_start();
include('php_conexion.php');

$sdep=$_SESSION['dependencia'];

if(!$_SESSION['tipo_usu']=='a'){
	header('location:error.php');
}
$nombre='';$tramite='';$tipodoc='';$fecha='';$hora='';$fechas='';$folios='';$ndoc='';$procedencia='';$dependencia='';$asunto='';$descripcion='';
if(!empty($_GET['id'])){	
	$id=$_GET['id'];
	$can=mysql_query("SELECT * FROM flujoe where id=$id");
	if($dato=mysql_fetch_array($can)){
		$nombre=$dato['idexpediente'];
				//Tramite que llega del rectorado
		$tramite=$dato['tramite'];
		$hora=$dato['hora'];
		$tipodoc=$dato['tipodoc'];
		$ndoc=$dato['ndoc'];
		$fechas=$dato['fechas'];
		$folios=$dato['folios'];
		$procedencia=$dato['procedencia'];
		$dependencia=$dato['dependencia'];
		$asunto=$dato['asunto'];
		$descripcion=$dato['descripcion'];
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
	<title>Guardar Documento</title>
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

      <!--CODIGO PARA LA DEPENDECIA DE TABLAS-->

      <script type="text/javascript">
      	$("document").ready(function(){
      		$("#procedencia").load("departamento.php");
      		$("#procedencia").change(function(){
      			var id =$("#procedencia").val();
      			$.get("dependencia.php",{param_id:id})
      			.done(function(data){
      				$("#dependencia").html(data);
      				
      			})
      			
      		})
      		
      	})
      </script>


  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">
  	<blockquote>
  		<a href="l_doc2.php" class="btn btn-info"><i class="icon-list-alt"></i> Ir Listado de Documentos</a>
  	</blockquote>
  	<div align="center">
  		<form name="form1" method="post" action="">
  			<table width="40%" border="0">
  				<tr>
  					<td colspan="3"><?php
  						if(!empty($_POST['nombre'])){
			//CAPTURAMOS LOS DATOS DEL FORMULARIO
  							$nombre=$_POST['nombre'];
  							$tramite=$_POST['tramite'];
  							$fecha=$_POST['fecha'];
  							$hora=$_POST['hora'];
  							$fechas=$_POST['fechas'];
  							$tipodoc=$_POST['tipodoc'];
  							$ndoc=$_POST['ndoc'];
  							$folios=$_POST['folios'];
  							$procedencia=$_POST['procedencia'];
  							$dependencia=$_POST['dependencia'];
  							$asunto=$_POST['asunto'];
  							$descripcion=$_POST['descripcion'];
  							
  							if($boton=='Actualizar'){
  								$xSQL="Update flujoe Set idexpediente='$nombre',fecha='$fecha',hora='$hora',fechas='$fechas',tipodoc='$tipodoc',ndoc='$ndoc',folios='$folios',procedencia='$procedencia',dependencia='$dependencia',asunto='$asunto',descripcion='$descripcion',folios='$folios'
  								Where id=$id";
  								
  								mysql_query($xSQL);
  								echo '<div class="alert alert-success">
  								<button type="button" class="close" data-dismiss="alert">X</button>
  								<strong>Documento!</strong> Actualizado con Exito
  							</div>';
  						}
  						
			//SI EL BOTON ES GUARDAR QUE LO GUARDE EN EXPEDIENTE Y FLUJO
  						else{
  							$can=mysql_query("SELECT * FROM expedientee where id='$id'");
  							if(!$dato=mysql_fetch_array($can)){
  								if (!preg_match("/\\s/", $ndoc)){ 
  									
			//REGISTRAR DATOS DEL DOCUMENTO		
  									
					//TABLA EXPEDIENTE
  									$sql = "INSERT INTO expedientee (idexpediente,tramite,fecha,hora,fechas,tipodoc,ndoc,folios,procedencia,dependencia,asunto,descripcion,area,codep,estado) VALUES ('$nombre','$tramite','$fecha','$hora','$fechas','$tipodoc','$ndoc','$folios','$procedencia','$dependencia','$asunto','$descripcion','12','$sdep','s')";
						//TABLA FLUJO
  									$sql2 = "INSERT INTO flujoe (idexpediente,tramite,fecha,hora,fechas,tipodoc,ndoc,folios,procedencia,dependencia,asunto,descripcion,area,codep,estado) VALUES ('$nombre','$tramite','$fecha','$hora','$fechas','$tipodoc','$ndoc','$folios','$procedencia','$dependencia','$asunto','$descripcion','12','$sdep','s')";
  									
  									mysql_query($sql);
  									mysql_query($sql2);
  									$nombre='';$tramite='';$fecha='';$hora='';;$fechas='';$tipodoc='';$ndoc='';$folios='';$procedencia='';$dependencia='';$asunto='';$descripcion='';$ndoc='';
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
  		?></td>
  	</tr>
  	<tr>
  		<td width="44%"><strong>N° Expediente</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($nombre)){ 
  				echo '<input type="text" name="nombre" id="nombre" value='.$nombre.' readonly>';
  			}else{
  				$query=mysql_query("select max(id) as id from expedientee");
  				$fila=mysql_fetch_array($query);
  				$ultimo=$fila['id']+1;	



  				echo '<input type="text" name="nombre" id="nombre" value='.$ultimo.' readonly>';	
  			}
  			?>
  			
  			
  			
  			
  		</td>
  		
  	</tr>
  	<tr>
  		<td width="44%"><strong>N° Tramite</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($tramite)){ 
  				echo '<input type="text" name="tramite" id="tramite" value='.$tramite.' >';
  			}else{
  				
  				echo '<input type="text" name="tramite" id="tramite"  >';	


  				
  			}
  			?>
  			
  			
  			
  			
  		</td>
  		
  	</tr>
  	<tr>
  		<td><strong>Fecha Recepcion</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($fecha)){ 
  				echo '<input type="text" name="fecha" id="fecha" value='.$fecha.' required>';
  			}else{
  				$fecha=date("d-m-Y");
  				echo '<input type="text" name="fecha" id="fecha" value='.$fecha.' required>';	
  			}
  			?>
  			
  			
  			
  		</td>
  	</tr>
  	<tr>
  		<td><strong>Hora Recepcion</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($hora)){ 
  				echo '<input type="text" name="hora" id="hora" value='.$hora.' required>';
  			}else{
  				$hora=date("H:i:s");
  				echo '<input type="text" name="hora" id="hora" value='.$hora.' >';	
  			}
  			?>
  			
  			
  			
  		</td>
  	</tr>
  	<tr>
  		<td><strong>Fecha Salida</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($fechas)){ 
  				echo '<input type="text" name="fechas" id="fechas" value='.$fechas.' required>';
  			}else{
  				$fechas=date("d-m-Y");
  				echo '<input type="text" name="fechas" id="fechas" value='.$fechas.' >';	
  			}
  			?>
  			
  			
  			
  		</td>
  	</tr>
  	<tr>
  		<td><strong>Tipo Doc</strong></td>
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
  		<td><strong>N° Doc.</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($ndoc)){ 
  				echo '<input type="text" name="ndoc" id="ndoc" value='.$ndoc.' >';
  			}else{
  				echo '<input type="text" name="ndoc" id="ndoc" value="" onKeyUp="this.value=this.value.toUpperCase();" >';	
  			}
  			?>
  			
  			
  			
  			
  			
  		</td>
  	</tr>
  	<tr>
  		<td><strong>Folios</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($folios)){ 
  				echo '<input type="text" name="folios" id="folios" value='.$folios.' >';
  			}else{
  				echo '<input type="text" name="folios" id="folios" value='.$folios.' >';	
  			}
  			?>
  			
  			
  			
  			
  			
  		</td>
  	</tr>
  	
  	
  	<tr>
  		<td><strong>Destinatario</strong></td>
  		<td colspan="2">
  			
  			<?php
  			
  			
  			if(!empty($procedencia)){ 
  				echo '<input type="text" name="procedencia" id="procedencia" value='.$procedencia.' readonly>';
  			}else{
  				
  				
  				echo "<select name='procedencia' id='procedencia' required>";
  				echo "<option value=''>Seleccionar...</option>";
  				
  				
  				
  			}
  			?>
  			
  			
  		</td>
  	</tr>
  	<tr>
  		<td><strong>Dependencia</strong></td>
  		<td colspan="2">
  			
  			<?php 
  			
  			if(!empty($dependencia)){ 
  				echo '<input type="text" name="dependencia" value='.$dependencia.' readonly>';
  			}else{
  				
  				
  				echo "<select name='dependencia' id='dependencia' required>";
  				echo "<option value=''>Seleccionar...</option>";
  				
  				
  				
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
  		<td><strong>Descripción</strong></td>
  		<td colspan="2">
  			<?php 
  			if(!empty($descripcion)){ 
  				echo '<textarea name="descripcion" id="descripcion"  required>'.$descripcion.'</textarea>';
  			}else{
  				echo '<textarea name="descripcion" id="descripcion"  required></textarea>';	
  			}
  			?>
  		</td>
  	</tr>
  	
  	<tr>
  		<td><strong></strong></td>
  		<td colspan="2">
  			
  		</td>
  	</tr>
  	<tr>
  		<td colspan="2">
  			<button type="submit" class="btn btn-info"><i class="icon-ok"></i> <?php echo $boton; ?></button>   </td>
  			<td width="56%">
  				<?php if($boton=='Actualizar'){
  					echo '<button class="btn btn-info"><a href="c_doc.php"><i class="icon-ok"></i> Ingresar Nuevo</a></button>';
  				} ?>
  			</td>
  		</tr>
  		<tr>
  			<td colspan="3">
  				
  			</td>
  		</tr>
  		<tr>
  			<td colspan="3">&nbsp;</td>
  			
  		</tr>
  	</table>
  </form>
</div>
</body>
</html>