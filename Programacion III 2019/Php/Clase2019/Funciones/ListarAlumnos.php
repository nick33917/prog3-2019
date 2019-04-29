<?php

$arrayAlumnos = array();

if(file_exists("ListadoAlumnosJson.json"))
{
    $file = fopen("ListadoAlumnosJson.json", "r");

    while(!feof($file))
    {
        array_push($arrayAlumnos,fgets($file));
    }

    fclose($file);

} 
else
{
    echo "El archivo \"ListadoAlumnos.json \"no existe";
}

var_dump($arrayAlumnos);

?>