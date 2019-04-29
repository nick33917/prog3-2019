<?php
include_once "proveedor.php";
class Pedido
{
    public $producto;
    public $cantidad;
    public $idProveedor;

    public function __construct($producto1, $cantidad1, $idProveedor1)
    {
        $this->producto = $producto1;
        $this->cantidad = $cantidad1;
        $this->idProveedor = $idProveedor1;

    }
    
    public static function LeerArchivo($ruta)
    {
        $arrayPedidos = array();
        if(file_exists($ruta))
        {
            $file = fopen($ruta, "r");
            while(!feof($file))
            {
                $cadena = trim(fgets($file));
                $datos= explode(",",$cadena);
                //valido si existe la posicion 2 dentro del array $datos , asi no me toma las lineas en blanco 
                if(array_key_exists(2,$datos)) 
                {
                    $ped = new Pedido($datos[0],$datos[1],$datos[2]);
                    array_push($arrayPedidos,$ped);
                }
            }
            fclose($file);
            return $arrayPedidos;
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

    public static function GuardarPedido()
    {
        $arrayProv=Proveedor::LeerArchivo("proveedores.txt");
        $idProv=$_POST['idProveedor'];
        $produc=$_POST['producto'];
        $cant=$_POST['cantidad'];

        if(Proveedor::VerificarProveedor($arrayProv,$idProv))
        {
            Pedido::GuardarEnArchivo("pedidos.txt", "$produc,$cant,$idProv");
            echo "El pedido se realizo Correctamente";
        }
        else
        {
            echo "No existe el id Del Proveedor";
        }

    }

    public static function HacerPedido()
    {
        /*
        4- (2pts.) caso: hacerPedido (post): Se recibe producto, cantidad y id de proveedor 
        y se guarda en el archivo pedidos.txt. 
        Verificar que exista el id del proveedor.*/

        Pedido::GuardarPedido();
    }

    public static function ListarPedidos()
    {
        $pedidos = Pedido::leerArchivo("pedidos.txt");
        $proveedores = Proveedor::leerArchivo("proveedores.txt");

        foreach($pedidos as $ped)
        {
            $nom;
            foreach($proveedores as $prov)
            {
                if((int)$prov->id == (int)$ped->idProveedor)
                {
                    $nom = $prov->nombre;
                    break;
                }
            }
            echo "Producto:" . $ped->producto . " ---Cantidad:". $ped->cantidad ." ---IdProv:" . $ped->idProveedor ." ---Nombre:" . $nom ."\n";
        }
    }

    public static function ListarPedidoProveedor()
    {
        $pedidos = Pedido::leerArchivo("pedidos.txt");
        $id = $_GET['id'];

        foreach($pedidos as $ped)
        {
            if((int)$ped->idProveedor == $id)
            {
                echo "Producto:" . $ped->producto . " ---Cantidad:". $ped->cantidad . "\n";
            }
        }
    }
}
?>