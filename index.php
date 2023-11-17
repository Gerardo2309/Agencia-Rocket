<?php include'consulta_hotel.php'; ?>
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
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <title>Agencia Rocket</title>
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <li>
            <a href="inicio.php" >Rocket</a>
          </li>
          <li>
            <a href="index.php" >Inicio</a>
          </li>
          <li>
            <a href="hoteles.php" >Hoteles</a>
          </li>
          <li>
            <a href="contacto.php" >Contacto</a>
          </li> 
        </ul>
      </nav>
    </header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/1.jpg" class="d-block w-100" id="imgcarusel">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/2.jpg" class="d-block w-100" id="imgcarusel">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/3.jpg" class="d-block w-100" id="imgcarusel">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div id="buscarres">
      <form>
        <div class="row" id="rowres">
          <div class="col-md-3">
            <i class="bi bi-geo-alt-fill"></i>
            <input type="text" class="form-control" name="destino" id="destino" required="true" placeholder="Destino">
          </div>
          <div class="col-md-3">
            <i class="bi bi-calendar-check-fill"></i>
            <input type="text" class="form-control" name="checkin" id="checkin" required="true" placeholder="Check In" onfocus="(this.type='date')">
          </div>
          <div class="col-md-3">
            <i class="bi bi-calendar-x-fill"></i>
            <input type="text" class="form-control" name="checkout" id="checkout"  required="true" placeholder="Check Out" onfocus="(this.type='date')">
          </div>
          <div class="col-md-3">
            <i class="bi bi-people-fill"></i>
            <input type="number" class="form-control" name="personas" id="personas"  required="true" placeholder="N. Personas" min="1">
          </div>
          <div class="col-md-12">
            <p class="btnres">
              <input type="submit" name="submit" class="btn btn-primary" value="Buscar" id="btnbuscar">
            </p>
          </div>
        </div>
      </form>
    </div>

    <br>


    <div class="container">
      <h3>Las Mejores promociones</h3>
      <hr>
    </div>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php 
        while ($usuario = $sentencia->fetch(PDO:: FETCH_ASSOC)) {?>
        <div class="col">
          <div class="card">
            <img src="img/card1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $usuario['nombre'];?></h5>
              <p>Estrellas</p>
              <p class="card-text"><?php echo $usuario['descripcion'];  ?></p>
              <p id="vermas">
                <input type="submit" name="vermas" value="Ver detalle" class="btn btn-primary" id="vermas">
              </p>
            </div>
          </div>
        </div>
        <?php  
        }?>
      </div>
    </div>

<?php include'footer.php'; ?>