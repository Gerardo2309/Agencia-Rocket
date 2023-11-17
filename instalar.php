<?php
$dbase = include "database.php";

try{
	$conexion = new PDO('mysql:host=' . $dbase['db']['host'] , $dbase['db']['user'] , $dbase['db']['pass'] , $dbase['db']['options']);
	$sql = file_get_contents("rocket.sql");

	$conexion -> exec($sql);

	echo "La base de datos y la tabla de alumnos se ha creado con exito";
	header('Location: index.php');
} catch(PDOExcetion $error){
	echo $error -> getMessage();
}
?>