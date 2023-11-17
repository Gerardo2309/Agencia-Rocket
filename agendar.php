<?php 
    $dbase = include 'database.php';
    $resultado = [
      'error' => false,
      'mensaje' => ''
    ];
    if (!isset($_GET['id'])) {
      $resultado['error'] = true;
      $resultado['mensaje'] = 'El hotel que desea seleccionar no existe';
    }

    try{
      $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
      $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);

      $id = $_GET['id'];
      $consultaSQLdt ="SELECT * FROM hoteles WHERE id='" . $id . "'";
       
      $sentencia = $conexion->prepare($consultaSQLdt);
      $sentencia->execute();

      $consultaSQLf ="SELECT * FROM hoteles_f WHERE idhotel='" . $id . "'";
      $sentenciaf = $conexion->prepare($consultaSQLf);
      $sentenciaf->execute();
      $hotel = $sentencia->fetch(PDO:: FETCH_ASSOC);
    

      if (!$hotel) {
        $resultado['error'] = true;
        $resultado['mensaje'] = "No se ha encontrado el Hotel";
      }

    } catch(PDOException $error){
      $resultado['error'] = true;
      $resultado['mensaje'] = $error -> getMessage(); 

    }
 ?>

<?php include'header.php'; ?>
<div class="container" >
	<div class="row">
        <div class="col-md-12">
          <h2 class="mt-4">Agendar Hotel</h2>
          <hr>
          <form method="post" action="sendmail.php">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $hotel['nombre'] ?>" readonly="readonly">
              </div>
              <div class="col-md-6">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="1" max="999999" class="form-control" name="precio" id="precio" value="<?php echo $hotel['precio'] ?>" disabled="disabled">
              </div>
              <div class="col-md-12">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $hotel['tipo'] ?>" disabled="disabled"> 
              </div>
              <div class="col-md-6">
                <label for="titular" class="form-label">Nombre del Titular</label>
                <input type="text" class="form-control" name="titular" id="titular"  required="true">
              </div>
              <div class="col-md-6">
                <label for="npersona" class="form-label">Numero de Personas</label>
                <input type="text" class="form-control" name="npersona" id="npersona"  required="true">
              </div>
              <div class="col-md-6">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" id="correo"  required="true">
              </div>
              <div class="col-md-6">
                <label for="telefono" class="form-label">Numero Telefonico</label>
                <input type="text" class="form-control" name="telefono" id="telefono"  required="true">
              </div>
              <div class="col-md-12">
                <label for="checkin" class="form-label">Check-in</label>
                <input type="date" class="form-control" name="checkin" id="checkin" value="<?php echo $hotel['checkin'] ?>" disabled="disabled">
              </div>
              <div class="col-md-12">
                <label for="checkout" class="form-label">Check-out</label>
                <input type="date" class="form-control" name="checkout" id="checkout" value="<?php echo $hotel['checkout'] ?>" disabled="disabled">
              </div>
              <div class="col-md-12">
                <br>
                <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
                <a href="login.php" class="btn btn-primary">Regresar al inicio</a>
              </div>
            </div>
          </form>
        </div>
     </div>

</div>

<?php include'footer.php'; ?>