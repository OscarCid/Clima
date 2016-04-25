<?php
/**
 * Created by IntelliJ IDEA.
 * User: Oscar
 * Date: 27/09/2015
 * Time: 18:55
 */
$host="sistema.meteorologiaupla.cl";
$user="meteorol_clima";
$password="5@pW(f_E]ExF";
$base="meteorol_clima";

$con = mysqli_connect($host,$user,$password,$base);
	if (!$con) {
		die('error: ' . mysqli_error($con));
	}
	$acentos = $con->query("SET NAMES 'utf8'");

?>