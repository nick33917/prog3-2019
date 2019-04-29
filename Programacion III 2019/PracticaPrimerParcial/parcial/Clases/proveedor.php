<?php
 class Proveedor
 {
    public $id;
    public $nombre;
    public $email;
    public $foto;

    public function __construct($id1, $nombre1, $email1, $foto1)
    {
        $this->id = $id1;
        $this->nombre = $nombre1;
        $this->email = $email1;
        $this->foto= $foto1;

    }

    public function ToString()
    {
        return "ID:" . $this->id . " ---NOMBRE:" . $this->nombre . " ---EMAIL:" . $this->email . " ---FOTO:" . $this->foto;
    }

    public static function LeerArchivo($ruta)
    {
        $arrayProveedores = array();
        if(file_exists($ruta))
        {
            $file = fopen($ruta,"r");
            while(!feof($file))
            {
                $cadena = trim(fgets($file));
                $datos= explode(",",$cadena);
                //valido si existe la posicion 2 dentro del array $datos , asi no me toma las lineas en blanco 
                if(array_key_exists(2,$datos)) 
                {
                    $prov = new Proveedor($datos[0],$datos[1],$datos[2],$datos[3]);
                    array_push($arrayProveedores,$prov);
                }
            }
            fclose($file);
            return $arrayProveedores;
        }

    }

    public static function GuardarEnArchivo($ruta,$contenido)
    {
        if(file_exists($ruta))
        {
            $file = fopen($ruta,"a");

            fwrite($file,$contenido."\r\n");

            fclose($file);
        }
        else
        {
            $file = fopen($ruta,"w");

            fwrite($file,$contenido."\r\n");

            fclose($file);
        }

    }

    public static function GuardarArrayEnArchivo($ruta,$array)
    {
        $file = fopen($ruta, "w");
        foreach($array as $prov)
        {
            fwrite($file, "$prov->id,$prov->nombre,$prov->email,$prov->foto \r\n");

        }
        fclose($file);
    }

    public static function CargarProveedor()
    {
        /*1- (2 pt.) caso: cargarProveedor (post): Se deben guardar los siguientes datos: id, nombre, email y foto.
         Los datos se guardan en el archivo de texto proveedores.txt, tomando el id  como identificador. */

        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $foto = $_FILES['foto']["tmp_name"];
        $proveedores = array();

        $extension = explode(".",$_FILES["foto"]["name"]);
        $pathNuevo = "Fotos/". $id.".". $nombre .".". $extension[1];
        move_uploaded_file($foto,$pathNuevo);

        Proveedor::GuardarEnArchivo("proveedores.txt","$id,$nombre,$email,$id.$nombre.$extension[1]");
        echo "El proveedor se registro Correctamente";

    }

    public static function ConsultarProveedor()
    {
    /*2- (2pt.) caso: consultarProveedor (get): Se ingresa nombre, 
    si coincide con algún registro del archivo proveedores.txt se retorna las ocurrencias, 
    si no coincide se debe retornar “No existe proveedor xxx” (xxx es el nombre que se buscó) 
    La búsqueda tiene que ser case insensitive.  */

        $flag = true;
        $nombre=$_GET['nombre'];

        $arrayProveedores = array();
        $arrayProveedores = Proveedor::LeerArchivo("proveedores.txt");
        
        foreach($arrayProveedores as $provee)
        {
            if($provee->nombre === $nombre)
            {
                echo $provee->ToString();
                $flag = false;
                break;
            }
        }
        if($flag)
        {
           echo "No existe el proveedor ". $nombre;
        }
    }

    public static function ListarProveedores()
    {
        $arrayProveedores = array();
        $arrayProveedores = Proveedor::LeerArchivo("proveedores.txt");

        foreach($arrayProveedores as $provee)
        {
            echo $provee->ToString() ."\n";
        }
    }

    public static function VerificarProveedor($array,$id)
    {
        $flag = false;
        foreach($array as $pedido)
        {
            if($pedido->id == $id)
            {
                $flag = true;
                break;
            }
        }
        return $flag ; 

    }

    public static function ModificarProveedor()
    {   
        /*caso: modificarProveedor(post):  Debe poder modificar todos los datos del proveedor menos el id 
        y guardar la foto antigua en la carpeta /backUpFotos ,
        el nombre de la foto será el id y la fecha. */
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $foto = $_FILES['foto']["tmp_name"];

        $proveedores = Proveedor::LeerArchivo("proveedores.txt");
        //var_dump($proveedores);
        foreach($proveedores as $prov)
        {
            if((int)$prov->id == $id)
            {
                $extension = explode(".",$_FILES["foto"]["name"]);
                $pathNuevo = "Fotos/". $id.".". $nombre .".". $extension[1];
                $pathViejo = trim("Fotos/". $prov->foto);
                rename($pathViejo,"backUpFotos/". $id . ".22-04-2019.".$extension[1]);
                move_uploaded_file($foto,$pathNuevo);
                $prov->nombre =$nombre;
                $prov->email = $email;
                $prov->foto = $id.".". $nombre .".". $extension[1];
                break;
            }
        }
        Proveedor::GuardarArrayEnArchivo("proveedores.txt",$proveedores);
    }

    public static function FotosBack()
    {
        $proveedores = Proveedor::LeerArchivo("proveedores.txt");
        $tabla = '<table border="1">';
        $ficheros = array();
        $directorio = "backUpFotos/";
        $gestor_dir = opendir($directorio);

        while (false !== $nombre_fichero = readdir($gestor_dir))
        {
            if($nombre_fichero != ".." && $nombre_fichero != ".")
            {
                $datos = explode(".",$nombre_fichero);
                $ruta = $directorio .$nombre_fichero;
                foreach($proveedores as $prov)
                {
                    if((int)$prov->id == $datos[0])
                    {
                        $tabla.='<tr>
                            <td>
                                <img src="'.$ruta.'" height="80" width="80">
                            </td>
                            <td>"'.$prov->nombre.'"</td>
                            <td>"'.$datos[1].'"</td>
                        </tr>';

                    }
                }
            }
        }
        $tabla.='</table>';
        echo $tabla;
    }
}
?>