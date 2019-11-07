<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<meta charset="UTF-8" />
	<title>Bienvenido</title>
</head>
<body>
	
</body>
</html>

<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENID@, " .$_SESSION['uname']."<br/>";
    echo "Hora de conexión: " .$_SESSION['time']."<br/>";
    echo "<a href='logout.php'> Logout </a>";
    echo "<h1 class='text-center'>Opciones de menú</h1>";
    echo "<a href='insert_products.php' style='display:flex;justify-content:center;'>Insertar Producto</a>";
    echo "<a href='list_products.php' style='display:flex;justify-content:center;'>Actualizar Producto</a>";
    echo "<a href='list_products.php' style='display:flex;justify-content:center;'>Borrar Producto</a>";
} else
    header("location:../html/form_login.html");
?>