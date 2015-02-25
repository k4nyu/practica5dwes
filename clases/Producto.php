<?php

class Producto {
    private $idproducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;
    private $imagen;
    
    function __construct($idproducto = null, $nombre = null, $descripcion = null, $precio = null, $iva = null, $imagen = null) {
        $this->idproducto = $idproducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->iva = $iva;
        $this->imagen = $imagen;
    }
    
    function set($datos, $inicio=0){
        $this->idproducto = $datos[0+$inicio];
        $this->nombre = $datos[1+$inicio];
        $this->descripcion = $datos[2+$inicio];
        $this->precio = $datos[3+$inicio];
        $this->iva = $datos[4+$inicio];
        $this->imagen = $datos[5+$inicio];;
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
    
    function getImagen() {
        return $this->imagen;
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
    
    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}