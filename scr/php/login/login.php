<?php
require_once("myDBC.php");
$consultas=new myDBC();
$user=$_REQUEST['correo'];
$pass=trim($_REQUEST['password']);
$log = $consultas->logueo($user, $pass);

?>
