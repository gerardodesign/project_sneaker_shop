<?php
session_start();
if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4"); 
   // $idUpt = $_GET['q'];
   //$sql="
   //print_r($_POST);
   
   $sneakers = $_POST['id'];
   $model = $_POST['modelo'];
   $price = $_POST['price'];
   $observation = $_POST['observacion'];
   $brand = $_POST['marca'];
   $color = $_POST['color'];
   $sql = "UPDATE sneakers SET model='$model',price='$price',observation='$observation',id_brands='$brand',id_colors='$color' WHERE id_sneakers=".$sneakers;
   $con-> query ($sql);
   header ('location:list_products.php');

   //UPDATE sneakers SET model='pruebatest',price=0,observation='pruebatest',id_colors=2,id_brands=6 WHERE id_sneakers=26;
}
?>