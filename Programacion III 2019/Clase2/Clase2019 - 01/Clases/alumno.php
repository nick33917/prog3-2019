<?php
include_once "persona.php";
class Alumno extends Persona
{
    public $legajo;
    function __construct($nombre,$edad,$dni,$leg)
    {
        parent::__construct($nombre,$edad,$dni);
        $this->legajo=$leg;
        
    }

    public function Guardar()
    {
        if(file_exists("listadoAlumnos.txt"))
        {
            $archivo = fopen("listadoAlumnos.txt","a");
            fwrite($archivo,"$this->nombre,$this->edad,$this->dni,$this->legajo\r\n");
            fclose($archivo);
        }
        else
        {
            $archivo = fopen("listadoAlumnos.txt","w");
            fwrite($archivo,$this);
            fclose($archivo);
        }
        
    }
    public function GuardarJSON()
    {
        if(file_exists("listadoJSON.json"))
        {
            $archivo = fopen("listadoJSON.json","a");
            $obj = $this->RetornarJson()."\r\n";
            fwrite($archivo,$obj);
            fclose($archivo);
        }
        else
        {
            $archivo = fopen("listadoJSON.json","w");
            fwrite($archivo,"$this\r\n");
            fclose($archivo);
        }
    }
    
}

?>