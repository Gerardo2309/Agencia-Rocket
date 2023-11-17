<?php  
$dbase = include 'database.php';

  $resultadoedit = [
    'error' => false,
    'mensaje' => 'El  Hotel se ha borrado correctamente'
  ];

  try{
      $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
      $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);

      $id = $_GET['id'];
      $consultaSQL ="SELECT * FROM hoteles WHERE id='" . $id . "'";
   
      $sentenciaedit = $conexion->prepare($consultaSQL);
      $sentenciaedit->execute();

    } catch(PDOException $error){

      $resultadoedit['error'] = true;
      $resultadoedit['mensaje'] = $error -> getMessage(); 

    }
  if (isset($_POST['submit'])) {
    try{
      $dns = 'mysql:host=' . $dbase['db']['host'] . ';dbname=' . $dbase['db']['name'];
      $conexion = new PDO($dns, $dbase['db']['user'], $dbase['db']['pass'], $dbase['db']['options']);
      $alumno = [
        "id"    => $_GET['id'],
        "nombre"  => $_POST['nombre'],
        "apellido"  => $_POST['apellido'],
        "email"   => $_POST['email'],
        "edad"    => $_POST['edad']
      ];
      $consultaSQL ="UPDATE alumnos SET
        nombre = :nombre,
        apellido = :apellido,
        email = :email,
        edad = :edad,
        updated_at = NOW()
        WHERE id = :id";
     
      $consulta = $conexion->prepare($consultaSQL);
      $consulta->execute($alumno);
    } catch(PDOException $error){
      $resultado['error'] = true;
      $resultado['mensaje'] = $error -> getMessage(); 
    }
  }




?>
<?php include'headerlog.php'; ?>
<?php  include 'comprobacion.php';
  if (isset($resultado)) {
  ?>
<div class="container mt-3" id="error_com">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
        <?= $resultado['mensaje'] ?>
      </div>
    </div>
    <div class="col-md-12">
      <p id="erbtn">
        <a href="login.php" class="btn btn-primary">Login</a>
      </p>
    </div>
  </div>
</div>
<?php
  die();
}
          
?>
<?php  
  if (isset($resultadoh) && isset($_POST['agregarh'])) {
?>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-<?= $resultadoh['error'] ? 'danger' : 'success' ?>" role="alert">
        <?= $resultadoh['mensaje'] ?>
      </div>
    </div>
  </div>
</div>
<?php
  }
?>
 
<?php while ($hotel = $sentenciaedit->fetch(PDO:: FETCH_ASSOC)) {?> 

<div class="container" id="ag_form">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-4">Editar "<?php echo $hotel['nombre'];  ?>"</h2>
          <hr>
          <form method="post">
            <div class="row g-3">
              <div class="col-md-2">
                <label for="idh" class="form-label">Identificador</label>
                <input type="text" class="form-control" name="idh" id="idh" required="true" value="<?php echo $hotel['id'];  ?>">
              </div>

              <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required="true" value="<?php echo $hotel['nombre'];  ?>">
              </div>
              <div class="col-md-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="1" max="999999" class="form-control" name="precio" id="precio" required="true" value="<?php echo $hotel['precio'];  ?>">
              </div>
              <div class="col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo"  required="true" value="<?php echo $hotel['tipo'];  ?>"> 
              </div>
              <div class="col-md-3">
                <label for="checkin" class="form-label">Check-in</label>
                <input type="date" class="form-control" name="checkin"   required="true" value="<?php echo $hotel['checkin'];  ?>">
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label for="checkout" class="form-label">Check-out</label>
                <input type="date" class="form-control" name="checkout"   required="true" value="<?php echo $hotel['checkout'];  ?>">
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label for="calificacion" class="form-label">Calificacion</label>
                <br>
                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off" name="star" value="1">
                <label class="btn btn-outline-secondary" for="btn-check-outlined" ><i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i></label>
                <input type="checkbox" class="btn-check" id="btn-check-outlined2" autocomplete="off" name="star" value="2">
                <label class="btn btn-outline-secondary" for="btn-check-outlined2" ><i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i></label>
                <input type="checkbox" class="btn-check" id="btn-check-outlined3" autocomplete="off" name="star" value="3">
                <label class="btn btn-outline-secondary" for="btn-check-outlined3" ><i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i></label>
                <input type="checkbox" class="btn-check" id="btn-check-outlined4" autocomplete="off" name="star" value="4">
                <label class="btn btn-outline-secondary" for="btn-check-outlined4" ><i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i></label>
                <input type="checkbox" class="btn-check" id="btn-check-outlined5" autocomplete="off" name="star" value="5">
                <label class="btn btn-outline-secondary" for="btn-check-outlined5" ><i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i></label>

              </div>
              <div class="col-md-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion"  required="true" autocomplete="off" value="<?php echo $hotel['descripcion'];  ?>">
              </div>
              <div class="col-md-3">
                <label for="foto1" class="form-label">Nombre de fotos 1</label>
                <input type="text" class="form-control" name="foto1" id="foto1"  required="true" autocomplete="off">
              </div>
              <div class="col-md-3">
                <label for="foto2" class="form-label">Nombre de fotos 2</label>
                <input type="text" class="form-control" name="foto2" id="foto2"  required="true" autocomplete="off">
              </div>
              <div class="col-md-3">
                <label for="foto3" class="form-label">Nombre de fotos 3</label>
                <input type="text" class="form-control" name="foto3" id="foto3"  required="true" autocomplete="off">
              </div>
              <div class="col-md-3">
                <label for="foto4" class="form-label">Nombre de fotos 4</label>
                <input type="text" class="form-control" name="foto4" id="foto4"  required="true" autocomplete="off">
              </div>
              <div class="col-md-12">
                <br>
                <input type="submit" name="agregardato" class="btn btn-primary" value="Enviar">
                <a href="hoteles_admin.php" class="btn btn-primary">Regresar al inicio</a>
              </div>
            </div>
          </form>
        </div>
      </div>
</div>

<?php } ?>
<?php include'footer2.php'; ?>