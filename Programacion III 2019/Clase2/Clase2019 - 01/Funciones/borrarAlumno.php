<?php
include_once "../Clases/alumno.php";
$legajo = $_POST["legajo"];
$array = array(); 
$array2 = array();
if(file_exists("../Archivos/listadoJSON.json"))
{
    $archivo = fopen("../Archivos/listadoJSON.json","r");
    while(!feof($archivo))
    {
        $str = fgets($archivo); 
        
        if($array2-> != $legajo)
        {
           //echo $str; 
           array_push($array,$str);
        }
    }
    fclose($archivo);
    
    }
}

$archivo = fopen("../Archivos/listadoJSON.json","w");
fwrite("../Archivos/listadoJSON.json",$array);
fclose($archivo);

?>