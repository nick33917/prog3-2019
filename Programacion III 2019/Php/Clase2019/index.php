<?php

include_once "Clases/alumno.php";

$dato = $_SERVER['REQUEST_METHOD'];

switch($dato)
{
    case "POST":
    require_once "./Funciones/CrearAlumno.php";
    break;
    case "PUT":
    require_once "./Funciones/ModificarAlumno.php";
    break;
    case "GET":
    require_once "./Funciones/ListarAlumnosPDO.php";
    //require_once "./Funciones/ListarAlumnos.php";
    break;
    case "DELETE":
    //require_once "./Funciones/BorrarAlumno.php";
    require_once "./Funciones/BorrarPDO.php";
    break;
}

//echo "<br> <h1> hola </h1> <br> <h2> bebe </h2> <br> <h3> como estas? </h3>";

/*$array = array();

$array["nombre"] = "Leo";
$array["edad"] = 21;

var_dump($array);*/

/*$miObj = new stdClass();
$miAlumno = new Alumno(1234, 40896935, "Leo", 21);

$miObj->nombre = "Leo";
$miObj->edad = 21;*/

/*$miAlumno->nombre = "Leo";
$miAlumno->edad = 21;*/

//var_dump($miAlumno);

//echo $miAlumno->retornarJson();

?>