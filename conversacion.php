<?php
include 'conexion.php';

$sql="select usuario,mensaje from chat order by codigo asc";
$result=mysql_query($sql);

while($data=mysql_fetch_assoc($result)){
	echo "<p><b>".$data["usuario"]."</b> dice: ".$data["mensaje"]."</p>";
}

?>