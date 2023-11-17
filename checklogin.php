<?php
  session_start();

  $dbase = include 'database.php';

    if (isset($_POST['submit'])) {

      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      try{
        $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
        $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);

        $consultaSQL ="SELECT * FROM  users WHERE idusuario = '" . $usuario . "'";
         
        $sentencia = $conexion->prepare($consultaSQL);
        $sentencia->execute();
        $usuario = $sentencia->fetch(PDO:: FETCH_ASSOC);
        $vuser = $usuario['nombre'];

        if($password == $usuario['password']){

          $_SESSION['loggedin'] = true;
          $_SESSION['nombreadmin'] = $vuser;
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

          /* "Bienvenido! " . $_SESSION['nombreadmin'];*/
         header('Location: hoteles_admin.php');

        }else{

          $resultado['error'] = true;
          $resultado['mensaje'] = 'Username o Password estan incorrectos.'; 
        }

      }catch(PDOException $error){
        $resultado['error'] = true;
        $resultado['mensaje'] = $error -> getMessage(); 
      }
    }
  ?>