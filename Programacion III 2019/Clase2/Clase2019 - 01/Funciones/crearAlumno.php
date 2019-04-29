<?php
//POST
include_once "../Clases/alumno.php";

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$dni = $_POST["dni"];
$legajo = $_POST["legajo"];
//var_dump($_POST);

$alum = new Alumno($nombre,$edad,$dni,$legajo);
echo $alum->RetornarJson();

$alum->Guardar();
$alum->GuardarJSON();

?>