<?php 
	include('admin/php_conexion.php'); 
	$n=0;
	$sqll=mysql_query("SELECT * FROM titulos");
	while($dato=mysql_fetch_array($sqll)){
		$n++;
		$v_titulop[$n]=$dato['titulo'];
		$v_cuadro[$n]=$dato['cuadro'];
	}
	$x=0;
	$sqlx=mysql_query("SELECT *, DATE_FORMAT(`fecha`,'%d/%m/%Y %H:%i:%s') AS my_date FROM noticias  ORDER BY my_date desc LIMIT 3");
	while($datos=mysql_fetch_array($sqlx)){
		$x++;
		$v_foto[$x]=$datos['id'];
		$v_titulo[$x]=$datos['titulo'];
		$v_intro[$x]=$datos['intro'];
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="admin/css/bootstrap.css" rel="stylesheet">
    <link href="admin/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="admin/css/docs.css" rel="stylesheet">
    <link href="admin/js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
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
    <script src="admin/js/bootstrap-affix.js"></script>
    <script src="admin/js/holder/holder.js"></script>
    <script src="admin/js/google-code-prettify/prettify.js"></script>
    <script src="admin/js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="admin/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="admin/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="admin/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="admin/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="admin/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="admin/ico/favicon.png">

</head>
<!--<body data-spy="scroll" data-target=".bs-docs-sidebar">-->
<BODY BGCOLOR="#00000" BACKGROUND="admin/img/fondoP.png" BGPROPERTIES=FIXED>
<div align="center">
<table width="77%" border="0">
  <tr>
    <td width="100%" align="center">
        <img src="admin/img/logo.png" alt="" height="450" width="600"> 
    </td>
   
    </tr>
  <tr>
    <td colspan="4">
    <Div align="center">
    	<strong>
        <ul class="breadcrumb">
        	<?php
				$can=mysql_query("SELECT * FROM tipos WHERE estado='s'");
				while($dato=mysql_fetch_array($can)){
					echo '<li><a href="noticias.php?codigo='.$dato['id'].'">'.$dato['nombre'].'</a> <span class="divider">/</span></li>';
				}
			?>      
        </ul>
    	</strong>
    </Div>
    </td>
    </tr>
  <tr>
    <td colspan="4">
    <div id="myCarousel" class="carousel slide">
    	<ol class="carousel-indicators">
    		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
		    <div class="active item" align="center">
            	<img src="admin/noticias/<?php echo $v_foto[1].'.jpg'; ?>" height="700" class="img-polaroid" width="700">
            	<div class="carousel-caption">
                	<h4><?php echo $v_titulo['1'] ?></h4>
                    <p><?php echo $v_intro[1]; ?></p>
                </div>
            </div>
    		<div class="item" align="center">
            	<img src="admin/noticias/<?php echo $v_foto[2].'.jpg'; ?>" class="img-polaroid" height="700" width="700">
            	<div class="carousel-caption">
                	<h4><?php echo $v_titulo['2'] ?></h4>
                    <p><?php echo $v_intro[2]; ?></p>
                </div>
            </div>
    		<div class="item" align="center">
            	<img src="admin/noticias/<?php echo $v_foto[3].'.jpg'; ?>" class="img-polaroid" height="700" width="700">
            	<div class="carousel-caption">
                	<h4><?php echo $v_titulo['3'] ?></h4>
                    <p><?php echo $v_intro[3]; ?></p>
                </div>
            </div>
    	</div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    
    
    
    </td>
    </tr>
  <tr>
    <td colspan="4">
    <div class="<?php echo $v_cuadro[1]; ?>">
    	<center><strong><h1><?php echo $v_titulop[1]; ?></h1></strong></center>
    </div>
    <div class="well" align="justify">
    	<?php echo $intro; ?>
    </div>
    <div class="row-fluid">
        <div class="span8">
        	<div class="<?php echo $v_cuadro[2]; ?>">
            	<center>
            	<strong><?php echo $v_titulop[2]; ?></strong>
            	</center>
            </div>
               <?php 
			   	mysql_query("SET NAMES 'utf8'");
			   		$sqlx=mysql_query("SELECT *, DATE_FORMAT(`fecha`,'%d/%m/%Y %H:%i:%s') AS my_date FROM noticias ORDER BY my_date desc LIMIT 5");
					while($datox=mysql_fetch_array($sqlx)){
					
			   ?>
                <!-- inicia codigo NOTICIAS IMPORTANTES! --> 
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="">
                            <img src="admin/noticias/<?php echo $datox['id'].'.jpg'; ?>" 
                            style="width: 80px; height: 80px;" class="media-object" data-src="holder.js/64x64">
                        </a>
                        <div class="media-body">
                          <h4 class="media-heading"><?php echo $datox['titulo']; ?></h4>
                          		<?php echo $datox['intro']; ?>
                            <br>
                            <div align="right">
                            	<a href="article.php?noticia=<?php echo $datox['id']; ?>" class="btn"><i class="icon-plus"></i> Leer Mas</a>
                            </div>
                        </div>
                   </div>
               </div>
 				<!-- fin codigo
                $v_titulop[$n]=$dato['titulo'];
				$v_cuadro[$n]=$dato['cuadro']; -->
                <?php } ?>
        </div>
        <div class="span4">
        	<div class="<?php echo $v_cuadro[3]; ?>">
            	<center>
            	<strong><?php echo $v_titulop[3]; ?></strong>
            	</center>
            </div>
            	<div class="well">
                <p align="justify"></p></div>
            <div class="alert alert-info">
            	<center><strong>Logo</strong></center>
            </div>
            <div class="well">
            <p align="center"><img src="admin/img/logo-unica.jpg" class="img-polaroid"></p></div>
        </div>
    </div>
    </td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  </table>
  
  <table width="100%" border="0">
      <tr>
        <td>
          	<br><br>
        	<div align="center">
                © Unica 2014 <?php echo $empresa; ?><br>
                <?php echo $direccion.' - '.$ciudad; ?>
            </div>
            <br><br>        
        </td>
      </tr>
  </table>

</div>
</body>
</html>