<?php

function autoload($clase) {
    require $clase . '.php';
}

spl_autoload_register('autoload');

class Controlador {

    function viewCarrito() {
        $bd = new BaseDatos();
        $modelo = new ModeloProducto($bd);
        $productos = $modelo->getList();
        $filas = "";
        $precioTotal = 0;
        $iva = 21;
        session_start();
        if (isset($_SESSION["__cesta"])) {
            
            $cesta = $_SESSION["__cesta"];
            $precio = 0;
            foreach ($cesta as $key => $linea) {
                $precio = $precio + ($linea->getCantidad() * $modelo->get($linea->getProducto()->getIdproducto())->getPrecio());              
            }
            $precioTotal = $precioTotal + $precio;
        }


        if (isset($_SESSION["__cesta"])) {
            $cesta = $_SESSION["__cesta"];

            foreach ($cesta as $key => $linea) {
                $datos = array(
                    "foto" => $linea->getProducto()->getImagen(),
                    "nombre" => $linea->getProducto()->getNombre(),
                    "precio" => $linea->getProducto()->getPrecio(),
                    "id" => $linea->getProducto()->getIdproducto(),
                    "cantidad" => $linea->getCantidad(),
                    "id" => $linea->getProducto()->getIdproducto(),
                    "id" => $linea->getProducto()->getIdproducto()
                );
                $v = new Vista("plantillaLinea", $datos);
                $filas.= $v->renderDatos();
            }
        }
        $datos = array(
            "lineas" => $filas,
            "subtotal" => $precioTotal - ($precioTotal * ($iva / 100)),
            "iva" => $iva,
            "total" => $precioTotal
        );
        $v = new Vista("plantillaCarrito", $datos);
        $v->render();
        exit();
    }

}