<?php
$datosAlumno =json_decode(trim(file_get_contents("php://input")));
var_dump($datosAlumno);
Alumno::BorrarAlumnoPDO($datosAlumno->id);
?>