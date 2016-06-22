<?php
include("php_conexion2.php");
$result = mysql_query("select * from departamento" );
echo "<select >";
echo "<option value=''>Selecionar...</option>";
while($row = mysql_fetch_array($result))
{
	echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
	}
	
	echo "</select>";
?>

