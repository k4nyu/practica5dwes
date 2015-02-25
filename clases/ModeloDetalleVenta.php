<?php

class ModeloDetalleVenta {
    private $bd;
    private $tabla = "detalleventa";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(DetalleVenta $objeto){
        $consultaSql = "insert into $this->tabla values(:iddetalleventa, :idventa, :idproducto, :cantidad, :precio, :iva);";
        $arrayConsulta["iddetalleventa"] = $objeto->getIddetalleventa();
        $arrayConsulta["idventa"] = $objeto->getIdventa();
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["cantidad"] = $objeto->getCantidad();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    function delete(DetalleVenta $objeto){
        $consultaSql = "delete from $this->tabla where iddetalleventa=:iddetalleventa";
        $arrayConsulta["iddetalleventa"] = $objeto->getIddetalleventa();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }

    function edit(DetalleVenta $objeto){        
        $consultaSql = "update $this->tabla set idventa=:idventa, idproducto=:idproducto, cantidad=:cantidad, precio=:precio, iva=:iva where iddetalleventa=:iddetalleventa;";
        $arrayConsulta["idventa"] = $objeto->getIdventa();
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["cantidad"] = $objeto->getCantidad();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $arrayConsulta["iddetalleventa"] = $objeto->getIddetalleventa();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function editPK(DetalleVenta $objetoNuevo, $iddetalleventapk){
        $consultaSql = "update $this->tabla set idventa=:idventa, idproducto=:idproducto, cantidad=:cantidad, precio=:precio, iva=:iva where :iddetalleventa=:iddetalleventapk;";
        $arrayConsulta["idventa"] = $objeto->getIdventa();
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["cantidad"] = $objeto->getCantidad();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $arrayConsulta["iddetalleventa"] = $objeto->getIddetalleventa();
        $arrayConsulta["iddetalleventapk"] = $iddetalleventapk;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($id){
        $consultaSql = "select * from $this->tabla where iddetalleventa=:iddetalleventa";
        $arrayConsulta["iddetalleventa"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $producto = new DetalleVenta();
            $producto->set($this->bd->getFila());
            return $producto;
        }else{
            return null;
        }
    }
    
    function count($condicion="1=1", $parametros=array()){
        $sql = "select count(*) from $this->tabla where $condicion";
        $r=$this->bd->setConsulta($sql, $parametros);
        if($r){
            $variable = $this->bd->getFila();
            return $variable[0];
        }
        return -1;
    }
    
    function getList($condicion="1=1",$parametros=array()){
        $list = array();
        $sql = "select * from $this->tabla where $condicion";
        $r = $this->bd->setConsulta($sql, $parametros);
        if($r){
            while($fila = $this->bd->getFila()){
                $producto = new DetalleVenta();
                $producto->set($fila);
                $list[] = $producto;
            }
        }else{
            return null;
        }
        return $list;
    }
}