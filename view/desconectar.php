<?php 
session_start();
if($_SESSION['user']){	
	session_destroy();
	header("location: ../view/index.php");
}
else{
	header("location: ../view/index.php");
}
?>