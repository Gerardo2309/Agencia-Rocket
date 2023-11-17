<?php


$dbase = include 'database.php';

    try{
      $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
      $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);

      $consultaSQL ="SELECT * FROM  hoteles ";
       
      $sentencia = $conexion->prepare($consultaSQL);
      $sentencia->execute();

      
  
      

    }catch(PDOException $error){
      $resultado['error'] = true;
      $resultado['mensaje'] = $error -> getMessage(); 
    }
?>