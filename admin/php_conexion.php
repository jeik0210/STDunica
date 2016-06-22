<?php
////////////////////////////////CONEXION//////////////////////////
	$conexion = mysql_connect('localhost','root','');
	mysql_select_db('unica_tramite',$conexion);
//////////////////////////////////////////////////////////////////

//PARA CONECTARSE CON LA BASE DE DATOS DE SIGU


//////////////////////////CONFIGURACION REGIONAL//////////////////

	$sqll=mysql_query("SELECT nombre FROM `region` WHERE id=(SELECT region FROM `empresa` WHERE id=1)");
	if($dato=mysql_fetch_array($sqll)){
		$bd_region=$dato['nombre'];
	}
	date_default_timezone_set($bd_region);
//////////////////////////////////////////////////////////////////
////////////////////////////DATOS AREA





////////////////////////////DATOS EMPRESA ////////////////////////

//PARA EL ERROR DE LAS TILDAS Y CARACTERES
mysql_query("SET NAMES 'utf8'");
	$sqll=mysql_query("SELECT * FROM `empresa` WHERE id=1");
	if($dato=mysql_fetch_array($sqll)){
		$empresa=$dato['empresa'];		$pagina=$dato['web'];
		$direccion=$dato['direccion'];	$ciudad=$dato['ciudad'];
		$eslogan=$dato['eslogan'];		$intro=$dato['intro'];
	}	
//////////////////////////////////////////////////////////////////
///////////////////////////PERMISOS Y SEGURIDAD///////////////////
	function Seguridad($usuario,$proteccion){
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='ca'){	  	
			if ($proteccion != 0){
				$sqll=mysql_query("SELECT * FROM permisos WHERE usu='$usuario' and per='$proteccion'");
				if($dato=mysql_fetch_array($sqll)){
					return $dato['est'];
				}else{
					return 0;
				}		
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
//////////////////////////////////////////////////////////////////
?>