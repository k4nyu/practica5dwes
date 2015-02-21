<?php


function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$modelo = new ModeloProducto();
$productos = $modelo->getList();


$cliente = Leer::post($cliente);
echo "cliente: ".$cliente;


file_put_contents("ventas/venta.txt", $cliente."\n", FILE_APPEND);
session_start();
//$cestaSesion = $sesion->getCesta();
if (isset($_SESSION["__cesta"])) {
    $cestaSesion = $_SESSION["__cesta"];
    foreach ($cestaSesion as $key => $lineacesta) {
        file_put_contents("ventas/venta.txt", $lineacesta->getProducto()->getNombre()." ",FILE_APPEND);
        file_put_contents("ventas/venta.txt", $lineacesta->getProducto()->getPrecio()." ",FILE_APPEND);
        file_put_contents("ventas/venta.txt", $lineacesta->getCantidad()."\n",FILE_APPEND);
    }
    file_put_contents("ventas/venta.txt", "\n ***************************** \n", FILE_APPEND);
}
?>

