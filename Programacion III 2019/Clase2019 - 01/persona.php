<?php
include_once "humano.php";
class Persona extends Humano
{
    public $dni;
    function __construct($nombre,$edad,$docum)
    {
        parent::__construct($nombre,$edad);
        $this->dni=$docum;
        
    }
    
}


?>