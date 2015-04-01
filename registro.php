<?php
include 'conexion.php';

$user=$_POST["user"];
$message=$_POST["message"];

$sql="INSERT INTO chat (usuario,mensaje) VALUES('$user','$message')";
$result=mysql_query($sql);

if($result){
	echo "Mensaje registrado";
}

?>