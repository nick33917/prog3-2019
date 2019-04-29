<?php

include_once "persona.php";
include_once "AccesoDatos.php";
class Alumno extends Persona
{
    public $legajo;
/*
    public function __construct($legajo1, $dni, $nombre, $edad)
    {
        parent::__construct($dni, $nombre, $edad);

        $this->legajo = $legajo1;
    }
*/  
    public function CasiConstructor($legajo1, $dni, $nombre, $edad)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->edad=$edad;
        $this->legajo = $legajo1;
    }

    public function GuardarAlumno()
    {
        if(file_exists("ListadoAlumnos.txt"))
        {
            $file = fopen("ListadoAlumnos.txt", "a");

            fwrite($file, "$this->nombre, $this->edad, $this->dni, $this->legajo \r\n");

            fclose($file);
        }
        else
        {
            $file = fopen("ListadoAlumnos.txt", "w");

            fwrite($file, "$this->nombre, $this->edad, $this->dni, $this->legajo \r\n");

            fclose($file);
        }
        
    }


    public function GuardarAlumnoJson()
    {
        if(file_exists("ListadoAlumnosJson.json"))
        {
            $file = fopen("ListadoAlumnosjson.json", "a");

            fwrite($file, $this->retornarJson()."\r\n");

            fclose($file);
        }
        else
        {
            $file = fopen("ListadoAlumnosJson.json", "w");

            fwrite($file, $this->retornarJson()."\r\n");

            fclose($file);
        }
        
    }

    public static function TraerTodosLosAlumnos()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select legajo,dni,nombre,edad from alumnos");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "alumno");		
    }

    public function InsertarElAlumnoParametro()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alumnos (legajo,dni,nombre,edad)values(:legajo,:dni,:nombre,:edad)");
		$consulta->bindValue(':legajo',$this->legajo, PDO::PARAM_INT);
		$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':edad',$this->edad, PDO::PARAM_INT);
		$consulta->execute();		
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
    public static function BorrarAlumnoPDO($legajo)
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from alumnos WHERE legajo=:legajo");	
		$consulta->bindValue(':legajo',$legajo, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
    }

}

?>