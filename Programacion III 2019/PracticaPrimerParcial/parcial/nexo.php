<?php

include_once "Clases/proveedor.php";
include_once "Clases/pedido.php";

$dato = $_SERVER['REQUEST_METHOD'];
switch($dato)
{
    case "POST":

        $caso = $_POST['caso'];

        if($caso == "cargarProveedor")
        {
            Proveedor::CargarProveedor();
        }
        elseif($caso == "hacerPedido")
        {
            Pedido::HacerPedido();
        }
        elseif($caso == "modificarProveedor")
        {
            Proveedor::ModificarProveedor();
        }
        break;

    case "GET":

        $caso = $_GET['caso'];
        
        if($caso == "consultarProveedor")
        {
            Proveedor::ConsultarProveedor();
        }
        elseif($caso== "proveedores")
        {
            Proveedor::ListarProveedores();

        }
        elseif($caso == "listarPedidos")
        {
            Pedido::ListarPedidos();
        }
        elseif($caso == "listarPedidoProveedor")
        {
            Pedido::ListarPedidoProveedor();
        }
        elseif($caso == "fotosBack")
        {
            Proveedor::FotosBack();
        }
        break;

}
?>