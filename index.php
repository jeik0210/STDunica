<?php
		session_start();
		include('admin/php_conexion.php'); 
		$act="0";
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=trim($_POST['usuario']);
			$contra=trim($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE usu='".$usuario."' and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
		$_SESSION['username']=$dato['nombre'];
		$_SESSION['tipo_usu']=$dato['tipo'];
		//SESIONAMOS EL CODIGO DE AREA DE TABLE EXPEDIENTE
		$_SESSION['dependencia']=$dato['dependencia'];
		//SESIONAMOS LA ID PARA UTILIZARLOS DESPUES!!!!
		
		//SESIONAMOS EL CODIGO DE AREA DE TABLE EXPEDIENTE
		$_SESSION['area']=$dato['codarea'];
		//SESIONAMOS LA ID PARA UTILIZARLOS DESPUES!!!!
		$_SESSION['id']=$dato['id'];
				
				// REDIRECCIONAMOS A LA PAGINA SI ES UN ADMINISTRADOR O USUARIO.
				if($_SESSION['tipo_usu']=='a'){
					header('location:admin/Administrador.php');
				}else if($_SESSION['tipo_usu']=='u'){
					header('location:client/Administrador_usu.php');
				}
			}
		}
	
			
			
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistema de Trámite Documentario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Tramite Documentario">
    <meta name="author" content="Joeski">

    <!-- Le styles -->
    <link href="admin/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
	background-image: url(admin/img/skyblue.jpg);
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="admin/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="admin/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="admin/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="admin/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="admin/ico/apple-touch-icon-57-precomposed.png">
    
    <!--PARA EL FAVICON -->
    <link rel="shortcut icon" href="admin/ico/favicon.ico" type="image/x-icon">
<link rel="icon" href="admin/ico/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="admin/ico/favicon.png">
  </head>

  <body>

    <div class="container">
      <form name="form1" method="post" action="" class="form-signin">
        <center><h2 class="form-signin-heading">ACCESO</h2></center>
        <input type="text" name="usuario" class="input-block-level" placeholder="Usuario">
        <input type="password" name="contra" class="input-block-level" placeholder="Contraseña">
        <button class="btn btn-large btn-primary" type="submit">Iniciar</button>
        <p>&nbsp;</p>
<?php
		$act="1";
		if(!empty($_POST['usuario']) or !empty($_POST['contra'])){
			$usuario=trim($_POST['usuario']);
			$contra=trim($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE usu='".$usuario."' and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
			}else{
				if($act=="1"){echo '<div class="alert alert-error" align="center">Usuario y/o Contraseña Incorrecta</div>';}else{$act="0";}
			}
		}else{
			
		}
	?>
      </form>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/bootstrap-transition.js"></script>
    <script src="admin/js/bootstrap-alert.js"></script>
    <script src="admin/js/bootstrap-modal.js"></script>
    <script src="admin/js/bootstrap-dropdown.js"></script>
    <script src="admin/js/bootstrap-scrollspy.js"></script>
    <script src="admin/js/bootstrap-tab.js"></script>
    <script src="admin/js/bootstrap-tooltip.js"></script>
    <script src="admin/js/bootstrap-popover.js"></script>
    <script src="admin/js/bootstrap-button.js"></script>
    <script src="admin/js/bootstrap-collapse.js"></script>
    <script src="admin/js/bootstrap-carousel.js"></script>
    <script src="admin/js/bootstrap-typeahead.js"></script>

  </body>
</html>
