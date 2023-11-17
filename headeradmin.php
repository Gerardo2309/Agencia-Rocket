<?php include'comprobacion.php';?>
<html lang="es">

    <head>
        
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/index2.css">

        <title>Agencia Rocket</title>
    </head>

    <body>
        <?php  
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
          die();}
          
        ?>
        <header >
          <nav>
            <ul>
                <li>
                    <h5 id="pana">Panel De Control</h5>
                </li>
                <li>
                    <div class="divimg">
                        <img src="img/perfil.jpg" class="imgp">
                    </div>
                </li>
                <li class="nav-item dropdown" id="lin">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <?php echo $_SESSION['nombreadmin']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Cerar Sesion</a></li>
                    </ul>
                </li>

                <li>
                    <a href="hoteles_admin.php" >Hoteles</a>
                </li>
                <li>
                    <a href="agregar_hotel.php" >Agregar<br>Hoteles</a>
                </li>
            </ul>
          </nav>
        </header>
