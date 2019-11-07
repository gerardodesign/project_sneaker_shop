<?php
// $userName=$_POST['username'];
// $pass= $_POST['password'];
// echo "<h4>Usuario:</h4>";
// echo $userName;
// echo "<br>";
// echo "<h4>Contraseña:</h4>";
// echo $pass;
//------------------------------------------------------
// define("SERVERNAME", "localhost");
// define("USERNAME", "root");
// define("PASSWORD", "belgrado");
// define("NAMEDB", "login");
//------------------------------------------------------
function openCon($config_ini){
$config = parse_ini_file($config_ini);
// $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, NAMEDB);
$conn=new mysqli($config['SERVERNAME'],$config['USERNAME'],$config['PASSWORD'],$config['NAMEDB']);
if ($conn == false)
    die("no me pude conectar, ahhhh!");
return $conn;
/*else
    echo ("bienvenido Sr.X");*/
}

function closeCon($conn){
 $conn->close();   
}

?>