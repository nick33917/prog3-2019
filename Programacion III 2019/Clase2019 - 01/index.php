<?php
include_once "alumno.php";
//ArrayAsociativo
//$array = array("nombre"=>"nicolas" ,"edad"=>24);

$array = array();
$array["Nombre"]="Nicolas";
$array["Edad"]=24;
                                 
//Objeto stdClass
$miObj = new stdClass();
$miObj->nombre="Nicolas";
$miObj->edad=25;

$miAlumno = new Alumno("Nicolas",23);

//echo $nombre;
var_dump($array);
var_dump($miObj);
var_dump($miAlumno);
echo $miAlumno->RetornarJson();

?>