<?php include'headerlog.php'; ?>

  <?php  
    if (isset($resultado)) {
  ?>
  <div class="container mt-3" id="error_log">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
  <div class="container" id="contenedor">
    <div class="card">
      <h5 class="card-header">Login</h5>
      <div class="card-body">
        <form  method="post" action="checklogin.php">
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control"  autocomplete="off" name="usuario" id="usuario" required="true">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required="true">
          </div>
          <div class="mb-3 ">
            <p class="mb-1 text-center">
              <a href="forgot-password.html">Olvidé mi contraseña</a>
            </p>
          </div>
          <div class="mb-3 ">
            <p class="mb-1 text-center">
              <a href="index.php">Regresar al inicio</a>
            </p>
          </div>
          <p class="mb-1 text-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Iniciar sesion">
          </p>
        </form>
      </div>
    </div>  
  </div>

<?php include'footer2.php'; ?>
