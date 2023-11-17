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
      $fotos = $sentenciaf->fetch(PDO:: FETCH_ASSOC);
      $fs = $fotos['estrellas'];
    

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
<div class="container" id="hot2">
	<hr>
	<?php while ($hotel = $sentencia->fetch(PDO:: FETCH_ASSOC)) {?>

	<h1 id="detitulo"><?php echo $hotel['nombre'];?></h1>
	<div class="row">
		<div class="col-md-5" id="detafotos">
			<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="img/<?php echo $fotos['foto1'];?>.jpg" class="d-block w-100" id="dtimg1">
			    </div>
			    <div class="carousel-item">
			      <img src="img/<?php echo $fotos['foto2'];?>.jpg" class="d-block w-100" id="dtimg2">
			    </div>
			    <div class="carousel-item">
			      <img src="img/<?php echo $fotos['foto3'];?>.jpg" class="d-block w-100" id="dtimg3">
			    </div>
			    <div class="carousel-item">
			      <img src="img/<?php echo $fotos['foto4'];?>.jpg" class="d-block w-100" id="dtimg4">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
			</div>
		</div>
		<div class="col-md-7">
			<div class="row">
				<div class="col-md-6">
					<p>Precio: $<?php echo $hotel['precio'];  ?>.00 MX</p>
				</div>
				<div class="col-md-6">
					<p>Calificacion
	        			<br>
	          			<?php for ($i=0; $i < $fs ; $i++) { ?>
							<i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i>
						<?php } ?>
					</p>
				</div>
				<div class="col-md-10">
					<p class="textdetalle">Detalle:<br><?php echo $hotel['descripcion'];  ?></p>
				</div>
				<div class="col-md-8">
					<a href="hoteles.php" class="btn btn-primary">Regresar</a>
				</div>
				<div class="col-md-4">
					<form method="post" action="agendar.php?id=<?php echo $hotel['id'];?>">
						<input type="submit" name="agendar" value="Agendar" class="btn btn-primary" id="agendar">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php }  ?>

</div>

<?php include'footer.php'; ?>