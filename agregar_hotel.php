<?php include'acciones.php'; ?>
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
 

<div class="container" id="ag_form">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-4">Agregar Nuevo Hotel</h2>
          <hr>
          <form method="post">
            <div class="row g-3">
              <div class="col-md-2">
                <label for="idh" class="form-label">Identificador</label>
                <input type="text" class="form-control" name="idh" id="idh" required="true">
              </div>

              <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required="true">
              </div>
              <div class="col-md-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="1" max="999999" class="form-control" name="precio" id="precio" required="true">
              </div>
              <div class="col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo"  required="true"> 
              </div>
              <div class="col-md-4">
                <label for="ubicacion" class="form-label">Ubicacion</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion"  required="true"> 
              </div>
              <div class="col-md-3">
                <label for="checkin" class="form-label">Check-in</label>
                <input type="date" class="form-control" name="checkin" id="checkin"  required="true">
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label for="checkout" class="form-label">Check-out</label>
                <input type="date" class="form-control" name="checkout" id="checkout"  required="true">
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
                <input type="text" class="form-control" name="descripcion" id="descripcion"  required="true" autocomplete="off">
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
                <input type="submit" name="agregarh" class="btn btn-primary" value="Enviar">
                <a href="hoteles_admin.php" class="btn btn-primary">Regresar al inicio</a>
              </div>
            </div>
          </form>
        </div>
      </div>
</div>


<?php include'footer2.php'; ?>