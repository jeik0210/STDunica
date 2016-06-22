<?php
   include("php_conexion.php"); 
require_once("dompdf/dompdf_config.inc.php");

?>
<div align="center">
<table class="table table-hover" border="0">
  <thead>
   <tr bgcolor="#33FF33">
    
    <td><strong>Expediente</strong></td>
    <td><strong>Area</strong></td>
    <td><strong>Ingreso</strong> </td>
    <td><strong>Hora</strong></td>
    <td><strong>Documento</strong></td>
    <td><strong>Salida</strong></td>
    <td><strong>Hora</strong></td>
	<td><strong>Remite</strong></td>
	<td><strong>Obs.</strong></td>
	<td><strong>Estado</strong></td>
  </tr>
  </thead>
  <tbody>
<?php
 	
	
	$can=mysql_query("select * from expediente");
	
	while($dato=mysql_fetch_array($can)){
		  ?>
  <tr><td>
	<?php 
	echo $dato['idexpediente'];
	
	 ?></td>
      <td><?php 
	  $area=$dato['area'];
	  $sql="select * from area where id=$area";
	  $query=mysql_query($sql);
	  $fila=mysql_fetch_array($query);
	  
	  echo $fila['nombre']; ?></td>
    <td><?php echo  $dato['fecha']; ?></td>
     <td><?php echo  $dato['hora']; ?></td>
    <td><?php   $tipo=$dato['tipodocumento'];
	 $sql="select * from tipo_documento where id=$tipo";
	  $query=mysql_query($sql);
	  
	  $fila=mysql_fetch_array($query);
	   echo $fila['nombre']; ?></td>
    <td><?php echo  $dato['fechaf']; ?></td>
     <td><?php echo  $dato['horaf']; ?></td>
  
    <td><?php echo  $dato['remite']; ?></td>
    <td><?php echo  $dato['asunto']; ?></td>
    <td>
    <?php
	$estado=$dato['estado'];
	 $sql="select * from estado where codigo='".$estado."'";
	  $query=mysql_query($sql);
	  $fila=mysql_fetch_array($query);
	   $c=$fila["codigo"];
	  $e=$fila["nombre"];
	  
	  echo $e;
     
?>
    
    </td>
  </tr>
  
  
  <?php }?>
  </tbody>
</table>
</div>