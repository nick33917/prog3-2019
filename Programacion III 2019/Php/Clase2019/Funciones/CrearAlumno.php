<?php

$legajo = $_POST["legajo"];
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];


//$objAlumno = new alumno($legajo, $dni, $nombre, $edad);
$objAlumno = new Alumno();
$objAlumno->CasiConstructor($legajo, $dni, $nombre, $edad);
$objAlumno->InsertarElAlumnoParametro();
//var_dump($objAlumno);

//$objAlumno->GuardarAlumno();
//$objAlumno->GuardarAlumnoJson();

?>