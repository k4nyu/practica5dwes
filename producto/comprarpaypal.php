<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$bd= new BaseDatos();
$modelo = new ModeloProducto($bd);
$productos = $modelo->getList();


$id = Leer::get("id");
$nombre = Leer::get("nombre");
$direccion = Leer::get("direccion");
$total = Leer::get("total");


file_put_contents("ventas/venta.txt", $nombre . "\n" . $direccion . "\n", FILE_APPEND);
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
            <input type="hidden" name="item_name" value="<?php echo $id; ?>">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <input type="hidden" name="return" value="http://fernandopuche.x10.mx/gracias.php">
            <input type="hidden" name="notify_url" value="http://fernandopuche.x10.mx/getpago.php">
            <input type="image" border="0" name="submit"  src="http://www.paypal.com/es_ES/i/btn/btn_buynow_LG.gif" >
        </form>
    </body>
</html>
