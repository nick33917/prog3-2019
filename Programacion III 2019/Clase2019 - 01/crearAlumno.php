<?php
include_once "alumno.php";
/*
echo "GET ";
var_dump($_GET);
echo "POST ";
var_dump($_POST);
//te muestra todo lo que le pasas 
/*
echo "REQUEST ";
var_dump($_REQUEST);
*/
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$dni = $_POST["dni"];
$legajo = $_POST["legajo"];
//var_dump($_POST);

$alum = new Alumno($nombre,$edad,$dni,$legajo);
echo $alum->RetornarJson();



?>