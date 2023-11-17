<?php include'consulta_hotel.php'; ?>
<?php include'header.php'; ?>
<div class="container" id="hot">
	<h3 class="tithotel">Hoteles Disponibles</h3>
	<hr>

	<div class="row row-cols-1 row-cols-md-3 g-4" >
	  <?php 
	  	while ($hotel = $sentencia->fetch(PDO:: FETCH_ASSOC)) {
	  		$id = $hotel['id'];
	  		$consultaSQLf ="SELECT * FROM  hoteles_f WHERE idhotel='" . $id . "'";
       
      		$sentenciaf = $conexion->prepare($consultaSQLf);
      		$sentenciaf->execute();
      		$fotos = $sentenciaf->fetch(PDO:: FETCH_ASSOC);
      		$fs = $fotos['estrellas'];
	  		?>
		<div class="col" >
	    	<div class="card" >
	    		<div id="cardhotel">
					<div id="carouselExampleControlsNoTouchin<?php echo $hotel['id'];?>" class="carousel slide" data-bs-touch="false" data-bs-interval="false" >
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
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouchin<?php echo $hotel['id'];?>" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouchin<?php echo $hotel['id'];?>" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>
	    		</div>
	        	<div class="card-body">
	          		<h5 class="card-title"><?php echo $hotel['nombre'];?></h5>
	          		<div class="row">
	          			<div class="col-md-6">
	          				<p class="card-text"><?php echo $hotel['ubicacion'];  ?></p>
	          			</div>
	          			<div class="col-md-6">
			          		<p>Calificacion
			          			<br>
			          		<?php for ($i=0; $i < $fs ; $i++) { ?>
								<i class="bi bi-star-fill" style="color: rgb(205,164,52); font-size: 1.4rem;"></i>
							<?php } ?>
							</p>
	          			</div>
	          			<div class="col-md-12">
	          				<p class="card-text">Tipo de habitacion:<br><?php echo $hotel['tipo'];  ?></p>
	          			</div>
	          		</div>
	          		<p id="vermas">
	          			<form method="post" action="detalle_hoteles.php?id=<?php echo $hotel['id'];?>">
	          				<input type="submit" name="vermas" value="Ver detalle" class="btn btn-primary" id="vermas">
	          			</form>
	          		</p>
	        	</div>
	    	</div>
		</div>
	    <?php  
	    }?>
	</div>
</div>

<?php include'footer.php'; ?>