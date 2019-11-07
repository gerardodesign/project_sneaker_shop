<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Edit_product</title>
<link
	href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap"
	rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/form.css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Ingreso de producto</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="save_products.php" method="post"
					enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label">Modelo *</label>
						<input type="text" class="form-control" placeholder="ingrese aquí modelo" required=" " name="modelo" id="modelo">
					</div>
					<div class="form-group">
						<label class="control-label">Precio *</label>
						<input type="text" class="form-control" placeholder="ingrese aquí precio" required=" " name="precio" id="precio">
					</div>
					
					<div class="form-group">
					<label class="control-label">Marca del producto</label>
					<select class="form-control" name="marca" id="marca">
					
						<?php 
						include_once '../includes/db.php';
						$con = openCon('../config/db_products.ini');
						//Scon = conexion
						$con ->set_charset("utf8mb4");
						//establece una comunicación del mismo idioma que la base de datos.
						$sql ="SELECT id_brand,description from brands order by description;";
						$result = $con ->query($sql);
						while($row = $result->fetch_assoc()){
						    //echo "<option>".$row['description']."</option>";
						    echo '<option value="'.$row['id_brand'].'">'.$row['description']."</option>";
						    
						}
						?>
					</select>
					</div>
					<div class="form-group">
					<label class="control-label">Color del producto</label>
					<select class="form-control" name="color" id="color">
					
						<?php 
						include_once '../includes/db.php';
						$con = openCon('../config/db_products.ini');
						//Scon = conexion
						$con ->set_charset("utf8mb4");
						//establece una comunicación del mismo idioma que la base de datos.
						$sql ="SELECT * from colors order by description;";
						$result = $con ->query($sql);
						while($row = $result->fetch_assoc()){
						    //echo "<option>".$row['description']."</option>";
						    echo '<option value="'.$row['id_colors'].'">'.$row['description']."</option>";
						}
						?>
					</select>
					</div>
					<div class="form-group">
					<label class="control-label">Seleccionar imagen</label>
					<input type="file" id="imagen" name="imagen" class="form-control-file" size="30">
					</div>
					
					<div class="form-group">
						<label class="control-label">Observación</label>
						<textarea row="3" class="form-control" placeholder="observacion" name="observacion" id="observacion"></textarea>
					</div>
					
					<div class="text-center">
						<input type="submit" class="btn btn-primary" value="Añadir producto"/>
					</div>
					<h6>(*) <small>Campo obligatorio </small></h6>

				</form>
			</div>
		</div>
	</div>




	<script src="../css/bootstrap.min.css" /></script>
	<script src="../js/jquery-3.4.1.min.js" /></script>
</body>
</html>