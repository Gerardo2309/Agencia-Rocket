<?php  
include 'funciones.php';
$dbase = include 'database.php';

if (isset($_POST['borrar'])) {

	$resulborrado = [
		'error' => false,
		'mensaje' => 'El  Hotel se ha borrado correctamente'
	];

	try{
			$dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
			$conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);

			$id = $_GET['id'];
			$consultaSQL ="DELETE FROM hoteles WHERE id='" . $id . "'";
	 
			$sentencia = $conexion->prepare($consultaSQL);
			$sentencia->execute();

			header('location: hoteles_admin.php');

		} catch(PDOException $error){

			$resulborrado['error'] = true;
			$resulborrado['mensaje'] = $error -> getMessage(); 

		}

}else if (isset($_POST['agregarh'])) {

  $resultadoh = [
    'error' => false,
    'mensaje' => 'El  Hotel ' . escapar($_POST['nombre']) . ' se ha agregado correctamente'
  ];


  try{
    $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
    $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);
    $hotel  = [
      "id"      => $_POST['idh'],
      "nombre"  => $_POST['nombre'],
      "precio"  => $_POST['precio'],
      "tipo"   => $_POST['tipo'],
      "ubicacion"   => $_POST['ubicacion'],
      "descripcion"    => $_POST['descripcion'],
      "checkin"    => $_POST['checkin'],
      "checkout" => $_POST['checkout'],
    ];
      $fhotel  = [
        "id"      => $_POST['idh'],
      "foto1"  => $_POST['foto1'],
      "foto2"  => $_POST['foto2'],
      "foto3"   => $_POST['foto3'],
      "foto4"    => $_POST['foto4'],
      "estrellas"    => $_POST['star'],
    ];

    $consultaSQL = "INSERT INTO hoteles (id, nombre, precio, tipo, ubicacion, descripcion, checkin, checkout)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($hotel)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($hotel);

    $consultaSQL = "INSERT INTO hoteles_f (idhotel, foto1, foto2, foto3, foto4, estrellas)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($fhotel)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($fhotel);

  } catch(PDOException $error){
    $resultadoh['error'] = true;
    $resultadoh['mensaje'] = $error -> getMessage(); 

  }
}else{
    $resultadoh = [
    'error' => true,
    'mensaje' => 'El  Hotel  no se ha podido  agregado correctamente'
  ];
}
?>
