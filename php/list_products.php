<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Lista de Productos</title>

<link rel="stylesheet" href="../css/bootstrap.min.css" />

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js" /></script>
<script src="../js/bootbox/bootbox.min.js"></script>


<script>
	function deleteProduct(cod_zapatilla){
		bootbox.confirm("¿Estas seguro de borrar el producto con el Código " + cod_zapatilla +  "?",function(result){

		if(result){
			window.location="delete.php?q="+cod_zapatilla;
		}
		}) 
	}
	function updateProduct(cod_zapatilla){
		window.location="edit.php?q="+cod_zapatilla;
		}
	</script>
</head>
<nav><a href="../index.php" class='btn btn-primary float-right' >Inicio</a></nav>
<body>
	<h1 class="text-center" style="margin: 20px 0px;">Listado de productos</h1>
	<table
		class="table table-bordered table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>Código</th>
				<th>Modelo</th>
				<th>Precio</th>
				<th>Color</th>
				<th>Marca</th>
				<th>Editar</th>	
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
		<?php
session_start();
if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    $sql = "SELECT s.id_sneakers as sneakers, s.model as model, s.price as price, c.description as colors, b.description as brands FROM sneakers s INNER JOIN brands b on s.id_brands=b.id_brand INNER JOIN colors c on s.id_colors=c.id_colors;";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
      <tr>
				<td><?php echo $row['sneakers'];?></td>
				<td><?php echo $row['model'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['colors'];?></td>
				<td><?php echo $row['brands'];?></td>
				<td><a href='#'
					onclick="updateProduct(<?php echo $row['sneakers']; ?>)"
					class='btn btn-outline-success'>Editar Producto</a></td>
				<td><a href='#'
					onclick="deleteProduct(<?php echo $row['sneakers']; ?>)"
					class='btn btn-outline-danger'>Eliminar Producto</a></td>
				
				
			</tr>
       <?php }} ?>
		</tbody>
	</table>
</body>
</html>