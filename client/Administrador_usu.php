<?php
		session_start();
		include('../admin/php_conexion.php'); 
		if(!$_SESSION['tipo_usu']=='a' or !$_SESSION['tipo_usu']=='u'){
			header('location:error.php');
		}
		if($_SESSION['tipo_usu']=='a'){
			$titulo='Administrador/a';
		}else{
			$titulo='Usuario';
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
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
  <!--PARA EL FAVICON -->
 <!--PARA EL FAVICON -->
<link rel="shortcut icon" href="../admin/ico/favicon.ico" type="image/x-icon">
<link rel="icon" href="../admin/ico/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="..admin/ico/favicon.png">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #FFF;
	background-image: url(img/fondoP.png);
}
</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
<table width="80%" border="0">
  <tr>
    <td>
    <div id="navbar-example" class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container" style="width: auto;">
          <a class="brand" href="../admin/presentacion.php" target="admin">Inicio</a>
          <ul class="nav" role="navigation">
            <li class="dropdown">
              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/c_usuario.php" target="admin">Registrar Usuarios</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/l_usuario.php" target="admin">Listar Usuarios</a></li>
                
                <!--<li role="presentation" class="divider"></li>-->  
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown"> Áreas<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/c_area.php" target="admin">Registrar Áreas</a></li>
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/l_area.php" target="admin">Listar Areas</a></li>
                
                
           		
           <!--      <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="" target="admin">Buscar Proveedor</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="" target="admin">Crear Proveedor</a></li>
                <li role="presentation" class="divider"></li> -->
              </ul>
            </li>
            
         <!--Aqui va el tercer menu -->
         <!--Aqui va el tercer menu -->
         <li class="dropdown">
              <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Tipo Documento<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/c_documento.php" target="admin">Registrar Tipo Documento</a></li>
              	<li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/l_documento.php" target="admin">Listar Tipo Documento</a></li>
               
           <!--      <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="" target="admin">Buscar Proveedor</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="" target="admin">Crear Proveedor</a></li>
                <li role="presentation" class="divider"></li> -->
              </ul>
            </li>
            
            
         <!--ESTRUCTURA DE UN MENU -->
          <ul class="nav">
            		<li class="dropdown">
                		           <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Administracion<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <!-- PRIMER SUBMENU-->
                        	<li class="dropdown-submenu">
                            	<a tabindex="-1" href="">Gestion Documentos Recibidos</a>
                            	<ul class="dropdown-menu">
                              		<li><a tabindex="-1" href="c_doc.php" target="admin">Crear Documentos</a></li>
                              		<li><a tabindex="-1" href="l_doc.php" target="admin">Listar Documentos</a></li>
                                   <!-- <li class="divider"></li>-->
                                  
                            	</ul>
                           </li>
                           
                           <!-- FIN SUBMENU-->
                            <!-- SEGUNDO SUBMENU--> 
                           <li class="dropdown-submenu">
                            	<a tabindex="-1" href="#">Gestion Documentos Emitidos</a>
                            	<ul class="dropdown-menu">
                              		<li><a tabindex="-1" href="c_doc2.php" target="admin">Crear Documentos</a></li>
                              		<li><a tabindex="-1" href="l_doc2.php" target="admin">Listar Documentos</a></li>
                                   <!-- <li class="divider"></li>-->
                                  
                            	</ul>
                           </li>
                           
                            <!-- FIN SUBMENU-->
                            <!-- SEGUNDO SUBMENU--> 
                           <li class="dropdown-submenu">
                            	<a tabindex="-1" href="">Seguimiento de Documentos</a>
                            	<ul class="dropdown-menu">
                              		<li><a tabindex="-1" href="s_doc.php" target="admin">Enviar Documento</a></li>
                              		
                                   <!-- <li class="divider"></li>-->
                                  
                            	</ul>
                           </li>
                           
                            <!-- FIN SUBMENU-->
                             <!-- SEGUNDO SUBMENU--> 
                           <li class="dropdown-submenu">
                            	<a tabindex="-1" href="">Historial de Documentos</a>
                            	<ul class="dropdown-menu">
                              		<li><a tabindex="-1" href="archivos.php" target="admin">Archivos</a></li>
                              		
                                   <!-- <li class="divider"></li>-->
                                  
                            	</ul>
                           </li>
                           
                            <!-- FIN SUBMENU-->
                           
                      </ul>
                     
                  </li>
                    
                    
				</ul>
   <!--FIN DE LA ESTRUCTURA -->
            
                        </li>
            
            
            
            </li>
          </ul>
          
          <ul class="nav pull-right">
          
            <!--AQUI EMPIEZA-->
           <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"> Area: <?php 
			  
			  $sarea=$_SESSION['area'];
	$sql="select * from area where id=$sarea";
$query=mysql_query($sql);
$fila=mysql_fetch_array($query);	
	
	
	echo "<STRONG>".$fila['nombre']."</strong>";
			  
	 ?> </a>
             
              
              
            </li>
            
            <!--AQUI TERMINA-->
          
          
          
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Hola! <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/cambiar_clave.php" target="admin"><i class="icon-refresh"></i> Cambiar Contraseña</a></li>
               <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Actualizar Informacion</a></li> -->
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="../admin/php_cerrar.php"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </td>
  </tr>
  <tr>
    <td><iframe src="../admin/presentacion.php" frameborder="0" scrolling="auto" name="admin" width="100%" height="900"></iframe></td>
  </tr>
  <tr>
    <td>
    <pre class="navbar navbar-fixed-bottom"><center><strong><a target="_blank" style="color:#000">Desarrollado: Oficina General de Tecnología Informatica y Comunicaciones</a></strong></center></pre>
    </td>
  </tr>
</table>
</body>
</html>