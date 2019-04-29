<?php
$pathViejo = $_FILES["foto"]["tmp_name"];
$legajo = $_POST["legajo"];
$nombre = $_POST["nombre"];


$extension = explode(".",$_FILES["foto"]["name"]);
$pathNuevo = "../Fotos/". $legajo .".". $nombre .".". $extension[1];

$estampa = imagecreatefrompng("../Estampa/icono.png");
$img =  imagecreatefrompng($_FILES["foto"]["tmp_name"]);
$margen_dcho = 10;
$margen_inf = 10;
$sx = imagesx($estampa);
$sy = imagesy($estampa);
imagecopy($img, $estampa, imagesx($img) - $sx - $margen_dcho, imagesy($img) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
header('Content-type: image/png');

imagepng($img,$pathNuevo);
//imagecopy($estampa,$img, 0, 0, 20, 13, 80, 40);

//si el archivo existe , lo mueve a otra carpeta y la nueva foto la guarda en /Fotos
if(file_exists($pathNuevo))
{
    //mueve un archivo a otro
    rename($pathNuevo,"../FotosBackUp/". $legajo .".". $nombre .".01-04-2019.".$extension[1]);
    //mueve un archivo temporal a otro archivo creado

    move_uploaded_file($pathViejo,$pathNuevo);
}
else
{
    imagepng($img,$pathNuevo);
    move_uploaded_file($pathViejo,$pathNuevo);
}

