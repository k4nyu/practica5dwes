<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');
$id = Leer::get("id");
// añadir el producto a la cesta
session_start();
if (isset($_SESSION["__cesta"])) {
    $cesta = $_SESSION["__cesta"];
} else {
    header("Location: ../index.php");
    exit();
}
$modelo = new ModeloProducto();
$producto = $modelo->get($id);

if (isset($cesta[$id])) {
    $lineacesta = $cesta[$id];
    $lineacesta->setCantidad($lineacesta->getCantidad() - 1);
    if ($lineacesta->getCantidad() < 1) {
        unset($cesta[$id]);
    }
    $_SESSION["__cesta"] = $cesta;
}
//
header("Location: ../index.php");
