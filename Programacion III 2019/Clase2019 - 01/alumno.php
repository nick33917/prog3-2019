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
    
}


?>