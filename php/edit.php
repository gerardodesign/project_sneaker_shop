<?php
session_start();
if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    $idUpt = $_GET['q'];
    $sql="SELECT s.id_sneakers as sneakers, s.model as model, s.price as price,s.observation as Sobservation,c.id_colors as idColor, c.description as color,b.id_brand as idBrand, b.description as brand FROM sneakers s INNER JOIN brands b on s.id_brands=b.id_brand INNER JOIN colors c on s.id_colors=c.id_colors WHERE id_sneakers=".$idUpt;
    $result = $con-> query ($sql);
    $row = $result -> fetch_assoc();
    //header ('location:list_products.php');
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>insert_product</title>
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
				<h3 class="text-center">Editar producto</h3>
			</div>
			<div class="col-md-12">
			<form class="form-group" accept-charset="utf-8"
					action="update_products.php" method="post"
					enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $row['sneakers'] ?>"/>
					</div>
					<div class="form-group">
						<label class="control-label" for="">Modelo</label>
						<input type="text" class=form-control id="modelo" name="modelo" value="<?php echo $row['model'] ?>" />
					</div>
					<div class="form-group">
						<label class="control-label" for="">Precio</label>
						<input type="text" class=form-control id="price" name="price" value="<?php echo $row['price'] ?>" />
					</div>
					<div class="form-group">
						<label class="control-label" for="" >Observación</label>
						<textarea rows="3" class="form-control" id="observacion" name="observacion"> <?php echo $row['Sobservation'] ?></textarea>
					</div>
					<div class="form-group">
						<label class="control-label">Marca</label>
						<select class="form-control" id="marca" name="marca">
						
						<option value=" <?php echo $row['idBrand']?>">
						<?php echo $row['brand']?>
						</option>
						<?php 
						$sqlbrand = "SELECT id_brand as id_brands, description as description from brands order by description; ";
                        $result = $con-> query ($sqlbrand);
                        while ($rowBrand = $result->fetch_assoc())
                        {
                         if ($row['idBrand']!= $rowBrand ['id_brands'])
                         {
                            ?>
                            <option value="<?php echo $rowBrand['id_brands']?>"><?php echo $rowBrand['description'] ?></option>
                            <?php
                         }}
                        ?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">Color</label>
						<select class="form-control" id="color" name="color">
						<option value=" <?php echo $row['idColor']?>">
						<?php echo $row['color']?>
						</option>
						<?php
						$sqlcolor = "SELECT id_colors as id_colors, description as description from colors order by description; ";
                        $result = $con-> query ($sqlcolor);
                        while ($rowColor = $result->fetch_assoc()) 
                        {
                         if ($row ['color'] != $rowColor ['description'])
                        {
                           ?>
                           <option value="<?php echo $rowColor['id_colors']?>">
                           <?php echo $rowColor['description'] ?>
                           </option>
                           <?php 
                        }
                        }
                            ?>
						</select>
					</div>
					<div class="text-center">
					<br />
					<input type="submit" class="btn btn-success" value="Guardar Producto"/>
					</div>
			</form>
</body>
</html>