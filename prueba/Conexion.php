<?php
$host = "blena5jidzshty0dbep0-mysql.services.clever-cloud.com";
$user = "ur6rhfoujzkhgtsa";
$pass = "tXN2sn72cghgN8jWldRI";
$db = "blena5jidzshty0dbep0";

$conexion = mysqli_connect($host,$user,$pass,$db) or die("Error de Conexion :( : ".mysqli_connect_error());
mysqli_query($conexion,"SET NAME 'utf8'");
?>