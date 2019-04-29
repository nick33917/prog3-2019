<?php
//GET
include_once "../Clases/alumno.php";
$array = array();
if(file_exists("listadoJSON.json"))
{
    $archivo = fopen("../Archivos/listadoJSON.json","r");
    while(!feof($archivo))
    {
        array_push($array,fgets($archivo));
    }
    fclose($archivo);
}
var_dump($array);
?>