<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$modelo = new ModeloProducto();
$productos = $modelo->getList();


$cliente = Leer::post("cliente");
echo "cliente: " . $cliente;


file_put_contents("ventas/venta.txt", $cliente . "\n", FILE_APPEND);
session_start();
//$cestaSesion = $sesion->getCesta();
if (isset($_SESSION["__cesta"])) {
    $cestaSesion = $_SESSION["__cesta"];
    foreach ($cestaSesion as $key => $lineacesta) {
        file_put_contents("ventas/venta.txt", $lineacesta->getProducto()->getNombre() . " ", FILE_APPEND);
        file_put_contents("ventas/venta.txt", $lineacesta->getProducto()->getPrecio() . " ", FILE_APPEND);
        file_put_contents("ventas/venta.txt", $lineacesta->getCantidad() . "\n", FILE_APPEND);
    }
    file_put_contents("ventas/venta.txt", "\n ***************************** \n", FILE_APPEND);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="_xclick" method="post"
              action="https://www.sandbox.paypal.com/cgi-bin/webscr" >
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="ironhill7-facilitator@hotmail.com">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="item_name" value="123">
            <input type="hidden" name="amount" value="9.99">
            <input type="hidden" name="return" value="http://fernandopuche.x10.mx/gracias.php">
            <input type="hidden" name="notify_url" value="http://fernandopuche.x10.mx/getpago.php">
            <input type="image" border="0" name="submit"  src="http://www.paypal.com/es_ES/i/btn/btn_buynow_LG.gif" >
        </form>
    </body>
</html>
