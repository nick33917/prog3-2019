<?php


    $datosAlumno =json_encode((trim(file_get_contents("php://input"))));
    $arrayAlumnos = array();
    $arrayJson = array();

        if(file_exists("ListadoAlumnosJson.json"))
        {
            $file = fopen("ListadoAlumnosJson.json", "r");

            while(!feof($file))
            {
                array_push($arrayAlumnos,fgets($file));
            }

            fclose($file);
            var_dump($arrayAlumnos);
            foreach($arrayAlumnos as $al)
            {
                array_push($arrayJson,json_decode($al));

            }
            var_dump($arrayJson);
        }
            /*

            $indice = array_search($datosAlumno['legajo'],$arrayAlumnos);
            if($indice)
            {
                unset($arrayAlumnos[$indice]);
                foreach($arrayAlumnos as $alum)
                {
                    $alum->GuardarAlumnoJson();
                }
            }

        }
        else
        {
            echo "El archivo \"ListadoAlumnos.json\"no existe";
        }
    
    

    
   

        
            
    /*
    $arrayAlumnos = array();
    $dni = ['dni'];

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
        echo "El archivo \"ListadoAlumnos.json\"no existe";
    }

    $arrayAlumnos = array_diff($arrayAlumnos, array($dni));
*/
?>