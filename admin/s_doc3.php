<?php
 		session_start();
		include('php_conexion.php'); 
		if(!$_SESSION['tipo_usu']=='a'){
			header('location:error.php');
		}else{
			//ACTUALIZAMOS EL ESTADO DE ATENDIDO A PENDIENTE EN LA TABLA EXPEDIENTE
			
			if(!empty($_GET['estado'])){
				$codig=$_GET['estado'];
				$cans=mysql_query("SELECT * FROM expediente WHERE estado='s' and id=$codig");
				if($d=mysql_fetch_array($cans)){
					$estado='n';
				}else{
					$estado='s';
				}
				$sql="UPDATE expediente SET estado='$estado' WHERE id=$codig";
				mysql_query($sql);
				header('location:s_doc2.php');
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
<div align="center">
<table width="80%" border="0" class="table">
  <tr class="info">
    <td><center>
    <strong>Seguimiento de Documentos</strong>
    </center></td>
  </tr>
  <td>
  <?php
  ///////////////////////////////////////////////////////////////////////////////////////////
  //ACTUALIZANDO EL DOCUMENTO EN TABLA FLUJO
  
	if(!empty($_POST['s_expediente'])){
		$ss_codigo=$_POST['s_codigo'];
		$ss_expediente=$_POST['s_expediente'];
		$ss_obs=$_POST['s_obs'];
$ss_area=$_POST['area'];
		$can=mysql_query("SELECT * FROM expediente WHERE id=$ss_codigo");
		if($dato=mysql_fetch_array($can)){
			
		//GUARDAR EN LA TABLA FLUJO y ACTUALIZAR LA TABLA EXPEDIENTE SOLO
		
			//$xSQL="Update tipos Set nombre='$ss_nombre' Where id=$ss_codigo";
			$tipodoc=$dato["tipodocumento"];
			$remite=$dato["remite"];
			$asunto=$dato["asunto"];
			
			//CAPTURAR LA HORA PARA VALIDARLO
			$horai=$dato['hora'];
			
			$fecha=date("d-m-Y");
			$hora=date("H:i:s");
			
			//AGREGAR REGISTRO EN TABLA FLUJO
			
			$xSQL = "INSERT INTO flujo (idexpediente,area,fecha,hora,tipodocumento,remite,asunto,estado) VALUES ('$ss_expediente','$ss_area','$fecha','$hora','$tipodoc','$remite','$ss_obs','s')";
			
			// ACTUALIZAR EN LA TABLA FLUJO LA FECHA Y LA HORA. SEGUN SE HAYA ENVIADO EL DOCUMENTO
			
			$zSQL="Update flujo Set  fechaf='$fecha',
									 horaf='$hora'
											
											
							Where hora='$horai'";
			
			
			
			
		// ACTUALIZAR EN LA TABLA EXPEDIENTE LA FECHA Y LA HORA. SEGUN SE HAYA ENVIADO EL DOCUMENTO
			
			$ySQL="Update expediente Set  fechaf='$fecha',
											horaf='$hora'
											
											
							Where id=$ss_codigo";
			
			
			mysql_query($xSQL);
			mysql_query($ySQL);
			mysql_query($zSQL);
			
			echo '	<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert">X</button>
						  <strong>Documento!</strong> Actualizado con Exito
					</div>';
		}else{
		//guardar seccion
			$sql="INSERT INTO tipos (nombre, estado) VALUES ('$ss_nombre','s')";
				mysql_query($sql);
			echo '	<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert">X</button>
						  <strong>Tipo de Noticia!</strong> Guardado con Exito
					</div>';
		}
	}
	?>

<table width="100%" border="0">
  <tr>
    <td width="48%">
    <div style="width: 90%; height: 250px; overflow-y: scroll;">
    <table width="80%" border="0" class="table">
      <tr>
        <td width="8%"><strong><center></center></strong></td>
        <td width="54%"><strong>Expediente</strong></td>
        
           <td width="38%"><center><strong>Estado</strong></center></td>
      </tr>
      <?php 
		$can=mysql_query("SELECT * FROM expediente");
		while($dato=mysql_fetch_array($can)){
			
			//MOSTRAR REGISTROS EN LA TABLA
			$nombre=$dato['idexpediente'];
			$id=$dato['id'];
			
			if($dato['estado']=="n"){
				$estado='<span class="label label-success">Atendido</span>';
			}else{
				$estado='<span class="label label-important">Pendiente</span>';
			}
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td><a href="s_doc3.php?codigo=<?php echo $id; ?>"><?php echo $nombre; ?></a></td>
        
        <td><center><a href="s_doc3.php?estado=<?php echo $id; ?>"><?php echo $estado; ?></a></center></td>
      </tr>
      <?php } ?>
    </table>
    </div>
    </center>
    </td>
    <td width="4%">&nbsp;</td>
    <td width="48%">
   
    <?php 
		if(empty($_GET['codigo'])){
			$can=mysql_query("SELECT MAX(id) as numero FROM expediente");
			if($dato=mysql_fetch_array($can)){
				$s_codigo=$dato['numero']+1;
				$s_nombre="";
				$boton="Guardar";
			}
		}else{
			$s_codigo=$_GET['codigo'];
			$can=mysql_query("SELECT * FROM expediente WHERE id=$s_codigo");
			if($dato=mysql_fetch_array($can)){
				
				
				
				//MOSTRANDO DATOS TRAIDOS DE LA IZQUIERDA SEGUN SU ID
				$s_nombre=$dato['idexpediente'];
				$area=$dato['area'];
			}
			$boton="Actualizar";
		}
		?>
    <div class="control-group info">
    <form name="form1" method="post" action="">
        <input type="hidden" name="s_codigo" id="s_codigo" value="<?php echo $s_codigo; ?>" >
        <table border="0">
        <tr>
        <td>
        <label for="textfield2">Expediente</label>
        </td>
        <td>
        <input type="text" name="s_expediente" id="s_expediente" value="<?php echo $s_nombre; ?>" required autocomplete="off">
        </td>
        </tr>
        <tr>
        <td>
        <label for="textfield2">Destino</label>
        </td>
        <td>
        <?php
		
$query=mysql_query("select * from area order by nombre asc");
	
	echo "<select name='area' id='area' required>";
	echo "<option value=''>Seleccionar...</option>";
	while($fila=mysql_fetch_array($query))
	{
	echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
	
		
			}
			
			
	?>
     </td>  
     </tr>
     
     <tr>
        <td>
        <label for="textfield2">Obs. Y/o Respuesta</label>
        </td>
        <td>
      
			<textarea name="s_obs" id="obs"  required></textarea>	
		
     </td>  
     </tr>
     <tr>
     <td>
      
        
        <button tabindex="submit" class="btn btn-primary"><?php echo $boton; ?></button>
        </td>
        <td>
        
         <?php if($boton=='Actualizar'){ ?> <a href="s_doc3.php" class="btn">Cancelar</a><?php } ?>
         </td>
         </tr>
         </table>
    </form>
    </div>
    </td>
  </tr>
</table>
</td>
  </tr>
</table>
</div>
</body>
</html>