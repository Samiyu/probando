<?php

require_once '../model/Database.php';
require_once '../model/connect_db.php';

session_start();
$email=$_POST['email'];
$clave=$_POST['clave'];

$sql=  mysql_query("select * from cliente where email='$email' and clave='$clave'");
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas>0) {
    header:("Location:admin.php");
}
else{
    echo "error";
}
mysqli_free_result($resultado);
mysqli_close();
