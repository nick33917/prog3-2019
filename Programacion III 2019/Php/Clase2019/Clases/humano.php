<?php

class Humano
{
    public $nombre;
    public $edad;
/*
    function __construct($nombre1, $edad1)
    {
        $this->nombre = $nombre1;
        $this->edad = $edad1;
    }
*/
    public function retornarJson()
    {
        return json_encode($this);
    }
}

?>