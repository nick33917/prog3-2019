<?php
class Humano 
{
    public $nombre;
    public $edad;
    function __construct($nom,$ed)
    {
            $this->nombre=$nom;
            $this->edad=$ed;
    }
    public function RetornarJson()
    {
        //transforma el objeto en un JSON.
        return json_encode($this);
    }
}
?>