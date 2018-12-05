<?php
session_start();
require_once '../model/connect_db.php';
$email = $_POST['email'];
$clave = $_POST['clave'];
$_SESSION['loggedin'] = false;
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
$sql2 = mysqli_query($mysqli, "SELECT * FROM cliente WHERE email='$email'");
$sql = mysqli_query($mysqli, "SELECT * FROM admin WHERE email='$email'");
if ($user = mysqli_fetch_assoc($sql2)) {
    if ($clave == $user['clave']) {
        $_SESSION['adm']= false;
        $_SESSION['user'] = $user['id_cliente'];
        $_SESSION['nombres'] = $user['nombres'];
        $_SESSION['apellidos'] = $user['apellidos'];
        $_SESSION['loggedin'] = true;
        echo '<script>alert("Bienvenido")</script> ';
        echo "<script>location.href='../view/index.php'</script>";
    }
}
if ($adm = mysqli_fetch_assoc($sql)) {
        if ($clave == $adm['clave']) {
            $_SESSION['adm']= true;
            $_SESSION['user'] = $adm['id_adm'];
            $_SESSION['nombres'] = $adm['nombre'];
            $_SESSION['loggedin'] = true;
            header('Location: ../view/adm/index.php');
//            echo '<script>alert("Bienvenido")</script> ';
            echo "<script>location.href='../view/adm/index.php'</script>";
        } else {
            echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
            echo "<script>location.href='../view/login.php'</script>";
        }
    }
 else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
    echo "<script>location.href='../view/index.php'</script>";
}
?>