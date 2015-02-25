<?php
class Paypal {
    
    private $idpaypal, $item_name, $verificado;
    
    function __construct($idpaypal = null, $item_name = null, $verificado = null) {
        $this->idpaypal = $idpaypal;
        $this->item_name = $item_name;
        $this->verificado = $verificado;
    }

    function getIdpaypal() {
        return $this->idpaypal;
    }

    function getItem_name() {
        return $this->item_name;
    }

    function getVerificado() {
        return $this->verificado;
    }

    function setIdpaypal($idpaypal) {
        $this->idpaypal = $idpaypal;
    }

    function setItem_name($item_name) {
        $this->item_name = $item_name;
    }

    function setVerificado($verificado) {
        $this->verificado = $verificado;
    }


}