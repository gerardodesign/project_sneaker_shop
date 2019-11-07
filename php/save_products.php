<?php
session_start();
if($_SESSION['logueado'])
{
    
include_once 'upload_image.php';
// include_once '../includes/db.php';
// $con = openCon('../config/db_products.ini');
// //Scon = conexion
// $con ->set_charset("utf8mb4");
// //establece una comunicación del mismo idioma que la base de datos.
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$marca = $_POST['marca'];
$color = $_POST['color'];
$observacion = $_POST['observacion'];

include_once '../includes/db.php';
$con = openCon('../config/db_products.ini');
$con->set_charset("utf8mb4");
$sql = "insert into sneakers (model,price,id_colors,id_brands,image,observation) values (?,?,?,?,?,?)";

$path_img = $directorio . $nombre_img;
$stmt = $con->prepare($sql);
$stmt -> bind_param("sdiiss", $modelo, $precio, $color, $marca, $path_img, $observacion);
if($stmt->execute()){
?>
<script>
alert("Producto ingresado correctamente");
window.location="insert_products.php";
</script>
<?php 
}
}
?>