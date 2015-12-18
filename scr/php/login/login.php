<?php
require_once("myDBC.php");
$consultas=new myDBC();
$user=$_POST['correo'];
$pass=trim($_POST['password']);
$log = $consultas->logueo($user, $pass);

?>
