<?php
/**
 * Description of LineaCesta
 *
 * @author Usuario
 */
class DetalleVenta {
    
    private $iddetalleventa, $idventa, $idproducto, $cantidad, $precio, $iva;
    
    function __construct($iddetalleventa=null, $idventa=null, $idproducto=null, $cantidad=null, $precio=null, $iva=null) {
        $this->iddetalleventa = $iddetalleventa;
        $this->idventa = $idventa;
        $this->idproducto = $idproducto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->iva = $iva;
    }
    
    function getIddetalleventa() {
        return $this->iddetalleventa;
    }

    function getIdventa() {
        return $this->idventa;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIva() {
        return $this->iva;
    }

    function setIddetalleventa($iddetalleventa) {
        $this->iddetalleventa = $iddetalleventa;
    }

    function setIdventa($idventa) {
        $this->idventa = $idventa;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }



}
