<?php
include("conectar.php");
?>








<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de Inventario</title>
	<link rel="stylesheet" href="themes/base/jquery.ui.all.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.accordion.js"></script>
    <script src="ui/jquery.ui.effect.js"></script>
	<script src="ui/jquery.ui.effect-blind.js"></script>
	<script src="ui/jquery.ui.effect-bounce.js"></script>
	<script src="ui/jquery.ui.effect-clip.js"></script>
	<script src="ui/jquery.ui.effect-drop.js"></script>
	<script src="ui/jquery.ui.effect-fold.js"></script>
	<script src="ui/jquery.ui.effect-slide.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="demo/demos.css">
    
	<!--AQUI VA EL SCRIPT PARA DAR VALORES A LOS DEPARTAMENTOS -->
    <script type="text/javascript" src="darValores.js">
</script>
<script type="text/javascript" src="js/validar_datos.js">
</script>
<!--AQUI VA EL SCRIPT PARA MODIFICAR LOS SELECT -->
    <script type="text/javascript" src="js/mostrar_datos.js">
</script>
	
	
    
    
    
 	<!--SCRIPT PARA DETECTAR QUE HA PRESIONADO LA TECLA ENTER -->
 <script type="text/javascript">
    function mostrar(caracter) {
        letra = caracter.which || event.keyCode;
        l = String.fromCharCode(letra);
		
		if(letra==13)
       { alert("Debe rellenar todos los campos vacios, antes de presionar ENTER")
	   return false;
	  // window.location='egresado.php';
	
	  }
	   
	   //alert("Usted presionó la letra: "+l+" Codigo: "+letra);}
    }
    window.onkeypress = mostrar;
	 
	
</script>   



<script>
	$(function() {
		$( "#datepicker" ).datepicker({
    dateFormat: 'dd/mm/yy' //Se especifica como deseamos representarla
  });
	  });
	</script>
     <script>
	$(function() {
		$( "#datepicker2" ).datepicker({
    dateFormat: 'yy/mm/dd' //Se especifica como deseamos representarla
  });
	  });
	</script>
     <script>
	$(function() {
		$( "#datepicker3" ).datepicker({
    dateFormat: 'yy/mm/dd' //Se especifica como deseamos representarla
  });
	  });
	</script>
     <script>
	$(function() {
		$( "#datepicker4" ).datepicker({
    dateFormat: 'yy/mm/dd' //Se especifica como deseamos representarla
  });
	  });
	</script>

       
	<script>
	$(function() {
		$( "#accordion" ).accordion({
			collapsible: true
		});
	});
	</script>
</head>
<body>
<form id="form" name="formulario"  method="POST" action="guardar.php" />
<center>
<div>
<img src="img/img-cabecera.png">
</div>
</center>
<br>

<div id="accordion">

	<h3>DATOS GENERALES</h3>
	<div>
    <table border="0" cellpadding="3" cellspacing="3">
	<tr>
                        <td colspan="2"><b>(*)Lugar</b></td>
                        <td colspan="5">:<?php
	$datos=mysql_query("select * from tipo_establecimiento order by nombre asc");
	echo "<select name='establecimiento' id='establecimiento'>";
	echo "<option value='0'>Elegir Establecimiento...</option>";
	while($fila=mysql_fetch_row($datos))
	{
	echo "<option value='".$fila[1]."'>".$fila[2]."</option>";
	}
	echo "</select>"
?>
                        
                        </td>
                          </tr>
                      <tr>
                        <td colspan="2"><b>(*)Departamento</b></td>
                        <td colspan="3">:<?php
	$datos=mysql_query("select * from departamento order by descripcion asc");
	echo "<select name='oficina' id='oficina' onChange='seleccionar()'>";
	echo "<option value='0'>Elegir Departamento...</option>";
	while($fila=mysql_fetch_row($datos))
	{
	echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
	}
	echo "</select>"
?></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>(*)Oficina</strong></td>
                        <td colspan="3">:<select name="suboficina" id="suboficina">
                            <option value="0">Elegir...</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>(*)Usuario</b></td>
                        <td colspan="3">:<input width="400" type="text" name="usuario" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>(*)Actividad</b></td>
                        <td colspan="3">:<?php
	$datos=mysql_query("select * from actividad order by descripcion asc");
	echo "<select name='actividad' id='actividad'>";
	echo "<option value='0'>Elegir Actividad...</option>";
	while($fila=mysql_fetch_row($datos))
	{
	echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
	}
	echo "</select>"
?>
                        
                        
                        </td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Fecha</b></td>
                        <td colspan="3">:<input type="text" name="fecha" id="datepicker" /></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td width="205">&nbsp;</td>
                        <td width="179">&nbsp;</td>
                        <td width="162">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
</table>

</div>

<h3>DATOS DEL EQUIPO</h3>
	<div>
    <table cellpadding="3" cellspacing="3">
     <tr>
                        <td colspan="2"><b>Codigo Inventario</b></td>
                        <td>:<input type="text" name="eq_codigo" onKeyUp="this.value=this.value.toUpperCase();" ></td>
                        <td>&nbsp;</td>
                        <td><b>N° de Perifericos</b></td>
                        <td colspan="2">:<input type="text" name="eq_nperiferico" id="lugar8"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Direccion Mac</b></td>
                        <td>:<input type="text" name="eq_direcmac" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td><b>Modelo</b></td>
                        <td colspan="2">:<input type="text" name="eq_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>N° de Serie</b></td>
                        <td>:<input type="text" name="eq_nserie" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>
                          
                          </td>
            
            
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr> 
</table>
</div>


	<h3>CONFIGURACION ACTUAL DEL HARDWARE</h3>
	<div>
    <table cellpadding="3" cellspacing="3">
      <tr>
                        <td colspan="2"><b>Tipo de Ordenador</b></td>
                        <td>:<select name="conf_tipoordenador">
                  <option value="" selected>Seleccionar...</option> 
                <option value="PC">PC</option> 
                <option value="NOTEBOOK">NOTEBOOK</option> 
                <option value="LAPTOP">LAPTOP</option> 
                <option value="SERVIDOR">SERVIDOR</option> 
                  
            </select>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><b>Marca</b></td>
                        <td colspan="2">:<select name="conf_marca">
                         <option value="" selected>Seleccionar...</option> 
                          <option value="LENOVO">LENOVO</option>
                          <option value="HP">HP</option>
                          <option value="TOSHIBA">TOSHIBA</option>
                          <option value="ADVANCE">ADVANCE</option>
                          <option value="IBM">IBM</option>
                          <option value="ASUS">ASUS</option>
                          <option value="COMPAQ">COMPAQ</option>
                             <option value="MICRONICS">MICRONICS</option>
                                <option value="HALION">HALION</option>
                                <option value="VAIO">VAIO</option> 
                                   <option value="COMPATIBLE">COMPATIBLE</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Sistema Operativo</b></td>
                        <td>:<select name="conf_sistemao">
                         <option value=""  selected>Seleccionar...</option> 
                            <option value="XP">XP</option>
                            <option value="VISTA">VISTA</option>
            
                            <option value="W7">W7</option>
                            <option value="W8">W8</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td><b>Tipo de Sistema Operativo</b></td>
                        <td colspan="2">:<select name="conf_tiposo">
                         <option value=""  selected>Seleccionar...</option> 
                          <option value="32/x86 Bits">32/x86 Bits</option>
                          <option value="64 Bits">64 Bits</option>
            
                        </select></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Service Pack</b> </td>
                        <td>:<select name="conf_servicepack">
                           <option value=""  selected>Seleccionar...</option> 
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      
</table>
</div>
	
    
    <h3>PROCESADOR</h3>
	<div>
    <table cellpadding="3" cellspacing="3">
    <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:
                          <select name="proc_marca" id="proc_marca" onChange="cambiar()">
                            <option value="" selected>Seleccionar...</option>
                            <option value="INTEL">INTEL</option>
                            <option value="AMD">AMD</option>
</select></td>
                        <td>&nbsp;</td>
                        <td><b>Tipo</b></td>
                        <td colspan="2">:<select name="proc_tipo" id="proc_tipo" >
                           <option value="" selected >Elegir...</option> 
                             </select></td>
                        
                        
                       
                      </tr>
                      <tr>
                        <td colspan="2"><b>Velocidad</b></td>
                        <td>:
                        <input type="text" name="proc_velocidad" id="lugar15">
                        <select name="proc_velocidad1">
                          <option value="" selected>Seleccionar...</option>
                          <option value="GHZ">GHZ</option>
                          <option value="MHZ">MHZ</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td><b>Modelo</b></td>
                        <td colspan="2">:<input type="text" name="proc_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                      </tr>
</table>

    </div>
 <h3>PLACA MADRE</h3>
	<div>
		<table>
        <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<select name="placa_marca">
                        <option value="" selected>Seleccionar...</option> 
                            <option value="INTEL">INTEL</option>
                            <option value="PCCHIPS">PCCHIPS</option>
                              <option value="IBM">IBM</option>
                                <option value="HP">HP</option>
                                  <option value="LENOVO">LENOVO</option>
                                    <option value="ECS">ECS</option>
                                      <option value="MSI">MSI</option>
                                        <option value="FOXCONN">FOXCONN</option>
                                                                <option value="GIGABYTE">GIGABYTE</option>
                                                     <option value="ASUS">ASUS</option>
                                                     <option value="ASUS">ASROCK</option>
                                                      <option value="COMPAQ">COMPAQ</option>
                                                      <option value="TOSHIBA">TOSHIBA</option>
                                                      <option value="VAIO">VAIO</option>
                                                       <option value="BIOSTAR">BIOSTAR</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Modelo</b></td>
                        <td>:<input type="text" name="placa_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                      <td>
                      </td>
                      <td>
                      </td>
                      </td> 
                      </tr>
        
        </table>
		
	</div>
   
   
   <h3>MEMORIA</h3>
	<div>
   <table cellpadding="3" cellspacing="3">
 <tr>
                        <td colspan="2"><b>Tipo</b></td>
                        <td>:<input type="text" name="mem_tipo" onKeyUp="this.value=this.value.toUpperCase();" ></td>
                        <td>&nbsp;</td>
                        <td><b>Capacidad</b></td>
                        <td colspan="2">:<select name="mem_capacidad">
                           <option value="" selected>Seleccionar...</option>
                           <option value="128MB">128MB</option>
                            <option value="256MB">256MB</option>
                            <option value="512MB">512MB</option>
                            <option value="1GB">1GB</option>
                            <option value="2GB">2GB</option>
                             <option value="3GB">3GB</option>
                            <option value="4MB">4GB</option>
                            <option value="8GB"> 8GB</option>
                             <option value="16GB"> 16GB</option>
                             <option value="32GB"> 32GB</option>
                            
                        </select></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Ranuras Disponibles</b></td>
                        <td>:<input type="text" name="mem_ranurasd" ></td>
                        <td>&nbsp;</td>
                        <td><b>Ranuras Usadas</b></td>
                        <td colspan="2">:<input type="text" name="mem_ranurasu" ></td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 </table>
    </div>
 
 
 <h3>ALMACENAMIENTO: DISCO DURO</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
 <tr>
                        <td colspan="2"><b>Capacidad</b></td>
                        <td>:<input type="text" name="discod_capacidad" ></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Tecnología</b></td>
                        <td>:<select name="discod_tecnologia">
                           <option value="" selected>Seleccionar...</option> 
                           <option value="IDE">IDE</option>
                            <option value="SATA">SATA</option>
                            <option value="BLUE">BLUE</option>
                            <option value="ESSCASY">ESSCASY</option>
                        </select>
                        
                        
                          
                          
            </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                    
                      <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<input type="text" name="discod_marca" onKeyUp="this.value=this.value.toUpperCase();" ></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>N° de Particiones</b></td>
                        <td>:<input type="text" name="discod_nparticiones" ></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 
 
 </table>
 
 
 </div>
 
 <h3>UNIDAD LECTORA</h3>
 <div>
 
 <table cellpadding="3" cellspacing="3">
  <tr>
                        <td colspan="2"><b>Tipo</b></td>
                        <td>:<select name="lectora_tipo">
                           <option value="" selected>Seleccionar...</option> 
                            <option value="CD">CD</option>
                            <option value="CD-RW">CD-RW</option>
                            <option value="DVD-RW">DVD</option>
                            <option value="DVD-RW">DVD-RW</option>
                             <option value="COMBO">COMBO</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<input type="text" name="lectora_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 
 </table>
 
 </div>
 
 
 <H3>TECLADO</H3>
 <DIV>
 
 <table cellpadding="3" cellspacing="3">
 <tr>
  <td colspan="2"><b>Tipo</b></td>
                        <td>:<input type="text" name="teclado_tipo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<input type="text" name="teclado_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Modelo</b></td>
                        <td>:<input type="text" name="teclado_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Serial</b></td>
                        <td>:<input type="text" name="teclado_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                   </table>   
                      
 </div>
 
 <H3>MOUSE</H3>
 <DIV>
 <table cellpadding="3" cellspacing="3">
 <tr>
  <td colspan="2"><b>Tipo</b></td>
                        <td>:<input type="text" name="mouse_tipo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<input type="text" name="mouse_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Modelo</b></td>
                        <td>:<input type="text" name="mouse_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Serial</b></td>
                        <td>:<input type="text" name="mouse_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 </table>
 
 </DIV>
 
 <h3>TARJETAS</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
  
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td align="center"><b>Marca</b></td>
                        <td align="center"><b>Modelo</b></td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Red</b></td>
                        <td>:<input type="text" name="red_marca" id="lugar3"></td>
                        <td>:<input type="text" name="red_modelo" id="lugar7"></td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Sonido</b></td>
                        <td>:<input type="text" name="sonido_marca" id="lugar33"></td>
                        <td>:<input type="text" name="sonido_modelo" id="lugar6"></td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Video</b></td>
                        <td>:<input type="text" name="video_marca" id="lugar4"></td>
                        <td>:<input type="text" name="video_modelo" id="lugar11"></td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Otro</b></td>
                        <td>:<input type="text" name="otro_marca" id="lugar5"></td>
                        <td>:<input type="text" name="otro_modelo" id="lugar13"></td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 </table>
 
 </div>
 
 <h3>MONITOR</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
  <tr>
                        <td colspan="2"><b>Tipo</b></td>
                        <td>:<select name="monitor_tipo">
                           <option value="" selected>Seleccionar...</option> 
                            <option value="LED">LED</option>
                            <option value="CRT">CRT</option>
                        </select></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Marca</b></td>
                        <td>:<input type="text" name="monitor_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Modelo</b></td>
                        <td>:<input type="text" name="monitor_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2"></td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Serial</b></td>
                        <td>:<input type="text" name="monitor_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2"><b>Tamaño</b></td>
                        <td>:<input type="text" name="monitor_tamanio" id="lugar37"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 </table>
 
 </div>
 
  <h3>SOFTWARE INSTALADO</h3>
 <div>
 
                          <table border="0" cellpadding="3" cellspacing="3">
                            <tr>
                              <td width="39" align="center"><b>Nro</b></td>
                              <td width="120" align="center"><b>Descripción</b></td>
                              <td width="120" align="center"><b>Licencia</b></td>
                              <td width="110" align="center"><b>Versión</b></td>
                              </tr>
                            <tr>
                              <td align="center">1</td>
                              <td><input type="text" name="soft_descripcion1" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia1" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version1" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">2</td>
                              <td><input type="text" name="soft_descripcion2" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia2" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version2" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">3</td>
                              <td><input type="text" name="soft_descripcion3" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia3" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version3" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">4</td>
                              <td><input type="text" name="soft_descripcion4" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia4" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version4" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">5</td>
                              <td><input type="text" name="soft_descripcion5" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia5" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version5" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">6</td>
                              <td><input type="text" name="soft_descripcion6" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia6" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version6" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">7</td>
                              <td><input type="text" name="soft_descripcion7" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia7" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version7" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">8</td>
                              <td><input type="text" name="soft_descripcion8" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia8" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version8" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">9</td>
                              <td><input type="text" name="soft_descripcion9" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia9" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version9" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">10</td>
                              <td><input type="text" name="soft_descripcion10" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia10" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version10" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">11</td>
                              <td><input type="text" name="soft_descripcion11" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia11" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version11" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            <tr>
                              <td align="center">12</td>
                              <td><input type="text" name="soft_descripcion12" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_licencia12" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              <td><input type="text" name="soft_version12" onKeyUp="this.value=this.value.toUpperCase();"></td>
                              </tr>
                            </table>
                        </td>
                        <td width="147">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
            
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td border>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 
 </table>
 </div>
  <h3>OBSERVACION</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
  <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="3" rowspan="5"><label for="ob"></label>
                        <textarea  name="ob" id="ob" cols="80" rows="10"></textarea></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 </table>
 
 
 </div>
  <h3>SUGERENCIAS DEL SOFTWARE</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
  <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="3" rowspan="5"><label for="suger"></label>
                          <textarea name="suger" id="suger" cols="80" rows="10"></textarea></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
 
 
 </table>
 </div>
 <h3>EQUIPOS DE IMPRESION</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
 <tr>
	        <td><b>Codigo Inventario</b></td>
	        <td>:<input type="text" name="imp_codigo" onKeyUp="this.value=this.value.toUpperCase();" ></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><strong>Tipo</strong></td>
	        <td>:<?php
	$datos=mysql_query("select * from tipo_impresora");
	echo "<select name='imp_tipo' onChange='indexar()' >";
	echo "<option value=''>Seleccionar...</option>";
	while($fila=mysql_fetch_row($datos))
	{
	echo "<option value='".$fila[0]."'>".$fila[1]."</option>";
	}
	echo "</select>"
?>            </td>
	        <td>&nbsp;</td>
	        <td>Subtipo</td>
	        <td><select name="imp_subtipo">
             <option value="" selected>Seleccionar...</option>
            	</select></td>
          </tr>
	      <tr>
	        <td><b>Marca</b></td>
	        <td>:<select name="imp_marca">
	            <option value="" selected>Seleccionar...</option>
	           </select></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><b>Modelo</b></td>
	        <td>:<input type="text" name="imp_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>


	        <td>&nbsp;</td>
	        <td><b>Serial</b></td>
	        <td>:<input type="text" name="imp_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
          </table>
 </div>
  <h3>SCANNER</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
   <tr>
	        <td><b>Codigo Inventario</b></td>
	        <td>:<input type="text" name="sc_codigo" onKeyUp="this.value=this.value.toUpperCase();" ></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><b>Tipo</b></td>
	        <td>:<input type="text" name="sc_tipo" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td><b>Modelo</b></td>
	        <td>:<input type="text" name="sc_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
          </tr>
	      <tr>
	        <td><b>Marca</b></td>
	        <td>:<input type="text" name="sc_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><b>Serial</b></td>
	        <td>:<input type="text" name="sc_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
          </table>
 </div>
  <h3>MULTIMEDIA-PROYECTOR</h3>
 <div>
 <table cellpadding="3" cellspacing="3">
  <tr>
	        <td><b>Codigo Inventario</b></td>
	        <td>:<input type="text" name="proy_codigo" onKeyUp="this.value=this.value.toUpperCase();" ></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><b>Marca</b></td>
	        <td>:<input type="text" name="proy_marca" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td><b>Modelo</b></td>
	        <td>:<input type="text" name="proy_modelo" onKeyUp="this.value=this.value.toUpperCase();"></td>
          </tr>
	      <tr>
	        <td><b>Tipo</b></td>
	        <td>:<input type="text" name="proy_tipo" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td><b>Serial</b></td>
	        <td>:<input type="text" name="proy_serial" onKeyUp="this.value=this.value.toUpperCase();"></td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      <tr>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
	        <td>&nbsp;</td>
          </tr>
	      </table>
 </div>
</div>
<h3>(*)Campos obligatorios</h3>
 <br><center><input type="button" id="benviar" name="benviar" value="REGISTRARSE" onClick="validar()" /></center><br>
<div class="demo-description">
<center><p>Derechos reservados: <code>Oficina General de Tecnologia Informatica y Comunicaciones</code> </p></center>
</div>
 </form>
</body>
</html>
