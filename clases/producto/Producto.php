<?php

class Producto {
    private $idproducto;
    private $nombre;
    private $iva;
    private $precio;
    private $descripcion;
    
    function __construct($idproducto = null, $nombre = null, $iva = null, $precio = null, $descripcion = null) {
        $this->idproducto = $idproducto;
        $this->nombre = $nombre;
        $this->iva = $iva;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIva() {
        return $this->iva;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIva($iva) {
        $this->iva = $iva;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}