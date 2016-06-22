<?php
include("php_conexion.php");
$iddepartamento= $_GET['param_id'];


$result = mysql_query("SELECT * FROM dependencia where coddepa =$iddepartamento order by nombre " );
echo "<select >";
echo "<option value=''>Seleccionar...</option>";
while($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row['codigo'].'">'.$row['nombre'].'</option>';
	}
	
	echo "</select>";
?>

