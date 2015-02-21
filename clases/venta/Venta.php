<?php

/**
 * Description of Cesta
 *
 * @author Usuario
 */
class Venta {
    private $idventa, $fecha, $hora, $pago, $direnvio, $nombre, $total;
    
    function __construct($idventa = null, $fecha = null, $hora = null, $pago = null, $direnvio = null, $nombre = null, $total=null) {
        $this->idventa = $idventa;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->pago = $pago;
        $this->direnvio = $direnvio;
        $this->nombre = $nombre;
        $this->total = $total;
    }
    
    function getIdventa() {
        return $this->idventa;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getPago() {
        return $this->pago;
    }

    function getDirenvio() {
        return $this->direnvio;
    }

    function getNombre() {
        return $this->nombre;
    }
    
    function getTotal() {
        return $this->total;
    }

    function setIdventa($idventa) {
        $this->idventa = $idventa;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setPago($pago) {
        $this->pago = $pago;
    }

    function setDirenvio($direnvio) {
        $this->direnvio = $direnvio;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTotal($total) {
        $this->total = $total;
    }
    
}
