<?php

require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$nombre = Leer::post("nombre");
$direccion = Leer::post("direccion");
$total = Leer::post("total");
$modeloventa = new ModeloVenta($bd);
$pago = "no";
$venta = new Venta(null, null, null, $pago, $direccion, $nombre, $total);
$modeloventa->add($venta);
$idVenta = $bd->getAutonumerico();
$modeloDetalle = new ModeloDetalleVenta($bd);

if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
    foreach ($cesta as $key => $linea) {
        $idproducto = $linea->getProducto()->getIdproducto();
        $cantidad = $linea->getCantidad();
        $precio = $linea->getProducto()->getPrecio();
        $iva = $linea->getProducto()->getIva();
        $detalle = new DetalleVenta(null, $idVenta, $idproducto, $cantidad, $precio, $iva);
        $modeloDetalle->add($detalle);
    }
}
header("Location: comprarpaypal.php?id=$idVenta&nombre=$nombre&direccion=$direccion&total=$total");
?>