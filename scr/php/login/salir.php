<?php
require_once("myDBC.php");
session_destroy();
header("Location: http://localhost/Clima/index");
?>
