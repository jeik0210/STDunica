<?php
 		session_start();
		include('php_conexion.php');
		
		//$sdep=$_SESSION['dependencia'];
		
		if(!$_SESSION['tipo_usu']=='a'){ 
			header('location:error.php');
		}
		
		
		//DEJAR LOS CAMBIOS VACIOS POR DEFECTO.
		$nombre='';$apellido='';$tipo='u';$usuario='';$con='';$correo='';
		if(!empty($_GET['id'])){	
			$id=$_GET['id'];
			$can=mysql_query("SELECT * FROM usuarios where id=$id");
			if($dato=mysql_fetch_array($can)){
				$nombre=$dato['nombre'];
				$apellido=$dato['apellido'];
				$procedencia=$dato['procedencia'];
				$dependencia=$dato['dependencia'];
				$usuario=$dato['usu'];
				$con=$dato['con'];
				$correo=$dato['correo'];
				$codarea=$dato['codarea'];
				
				$tipo=$dato['tipo'];
				$boton="Actualizar Usuario";	
			}
		}else{
			$id='';
			$boton="Guardar Usuario";
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
 <a href="l_usuario.php" class="btn btn-info"><i class="icon-list-alt"></i> Ir Listado de Usuario</a>
 </blockquote>
<div align="center">
<form name="form1" method="post" action="">
<table width="40%" border="0">
  <tr>
    <td colspan="3">
		<?php
		if(!empty($_POST['nombre']) and !empty($_POST['usu'])){
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$procedencia=$_POST['procedencia'];
			$dependencia=$_POST['dependencia'];
			$usuario=$_POST['usu'];
			$con=$_POST['con'];
			$tipo=$_POST['tipo'];
			$correo=$_POST['correo'];
			$codarea=$_POST['codarea'];
			if(!empty($_POST['con'])){
				$con=$_POST['con'];
			}
			
			if($boton=='Actualizar Usuario'){
				$xSQL="Update usuarios Set  nombre='$nombre',
											apellido='$apellido',
											usu='$usuario',
											con='$con',
											correo='$correo',
											codarea='$codarea',	
											procendencia='$procedencia',
											dependencia='$dependencia',	
											tipo='$tipo'
							Where id=$id";
					
				if(mysql_query($xSQL))
				{
				
				echo '<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert">X</button>
						  <strong>Usuario!</strong> Actualizado con Exito
					</div>';
				}
				else
				{
					
					
					echo '	<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">X</button>
									<strong>Error!</strong> Al momento de actualizar.
								</div>';
						
					
					
					
					}
			}
			
			
			
			else{
				$can=mysql_query("SELECT * FROM usuarios where usu='$usuario'");
				if(!$dato=mysql_fetch_array($can)){
					if (!preg_match("/\\s/", $usuario)){ 
					
			//REGISTRAR DATOS		
					
						$sql = "INSERT INTO usuarios (nombre,apellido,procedencia,dependencia,usu,con,tipo,correo,codarea, estado) VALUES ('$nombre','$apellido','$procedencia','$dependencia','$usuario','$con','$tipo','$correo','$codarea','s')";
						if(mysql_query($sql))
						{
							
							echo '	<div class="alert alert-success">
								  <button type="button" class="close" data-dismiss="alert">X</button>
								  <strong>Usuario!</strong> Guardado con Exito
								</div>';
								
						$nombre='';$apellido='';$tipo='u';$usuario='';$con='';$correo='';
						}
						
					else
					{
						echo '	<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">X</button>
									<strong>Error!</strong> Problemas al Guardar Registro.
								</div>';
						
						
						}
						
								
								
								
					}else{
						echo '	<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">X</button>
									<strong>Error!</strong> No se permiten espacios en la cuenta de usuario.
								</div>';
								$usuario='';$con='';
					}
				}else{
					echo '	<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">X</button>
									<strong>Error!</strong> Este usuario ya existe.
								</div>';
								$usuario='';
				}
			}
		}
        ?>
    </td>
    </tr>
  <tr>
    <td width="44%"><strong>Nombres</strong></td>
    <td colspan="2"><input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required></td>
  </tr>
   <tr>
    <td width="44%"><strong>Apellidos</strong></td>
    <td colspan="2"><input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" autocomplete="off" onKeyUp="this.value=this.value.toUpperCase();" required></td>
  </tr>
  <tr>
    <td><strong>Usuario</strong></td>
    <td colspan="2"><input type="text" name="usu" id="usu" value="<?php echo $usuario; ?>" <?php if(!empty($usuario)){} ?> autocomplete="off" required></td>
  </tr>
  <tr>
    <td><strong>Contraseña</strong></td>
    <td colspan="2">
    	<?php 
			if(!empty($con)){ 
				echo '<input type="password" name="con" id="con" value='.$con.' required>';
			}else{
				echo '<input type="password" name="con" id="con" required>';	
			}
		?>
    	
    </td>
  </tr>
  <tr>
    <td><strong>Correo</strong></td>
    <td colspan="2">
    
<input type="text" name="correo" id="correo" value="<?php echo $correo; ?>" autocomplete="off" required>	</td>
  </tr>
  
  <tr>
    <td><strong>Area</strong></td>
    <td colspan="2">
    
    <?php 
			if(!empty($codarea)){ 
				echo '<input type="text" name="codarea" id="codarea" value='.$codarea.' required>';
			}else{
				$query=mysql_query("select * from area order by nombre asc");
	
	echo "<select name='codarea' id='codarea' required>";
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
    <td><strong>Procedencia</strong></td>
    <td colspan="2">    
    
   	    <?php
		
		
			if(!empty($procedencia)){ 
				echo '<input type="text" name="procedencia" id="procedencia" value='.$procedencia.' required>';
			}else{
				$query=mysql_query("select * from departamento order by nombre asc");
	
	echo "<select name='procedencia' id='procedencia' required>";
	echo "<option value=''>Seleccionar...</option>";
	
	while($fila1=mysql_fetch_array($query))
	{
	echo "<option value='".$fila1['id']."'>".$fila1['nombre']."</option>";
	
			}
		
			}
	?>
    </td>
  </tr>
    <tr>
    <td><strong> Dependencia</strong></td>
    <td colspan="2">    
    	
    	  <?php 
   
			if(!empty($dependencia)){ 
				echo '<input type="text" name="dependencia" value='.$dependencia.' required>';
			}else{
				$query=mysql_query("select * from dependencia order by nombre asc");
	
	echo "<select name='dependencia' id='dependencia' required>";
	echo "<option value=''>Seleccionar...</option>";
	
	while($fila2=mysql_fetch_array($query))
	{
	echo "<option value='".$fila2['id']."'>".$fila2['nombre']."</option>";
	
			}
		
			}
	?>
    </td>
  </tr>
  <tr>
    <td><strong>Tipo de Usuario</strong></td>
    <td colspan="2">
    	<input type="radio" name="tipo" id="tipo" value="a"<?php if($tipo=="a"){ echo 'checked'; } ?>> Administrador<br>
        <input type="radio" name="tipo" id="tipo" value="u"<?php if($tipo=="u"){ echo 'checked'; } ?>> Usuario
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
      <button type="submit" class="btn btn-info"><i class="icon-ok"></i> <?php echo $boton; ?></button>    </td>
    <td width="56%">
      <?php if($boton=='Actualizar Usuario'){
          	echo '<button class="btn btn-info"><a href="c_usuario.php"><i class="icon-ok"></i> Ingresar Nuevo</a></button>';
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