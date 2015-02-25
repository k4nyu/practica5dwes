<?php

class ModeloVenta {
    private $bd;
    private $tabla = "venta";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(Venta $objeto){
        $consultaSql = "insert into $this->tabla values(null, curdate(), null, :pago, :direnvio, :nombre, :total);";
        $arrayConsulta["pago"] = $objeto->getPago();
        $arrayConsulta["direnvio"] = $objeto->getDirenvio();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["total"] = $objeto->getTotal();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    function delete(Venta $objeto){
        $consultaSql = "delete from $this->tabla where idventa=:idventa";
        $arrayConsulta["idventa"] = $objeto->getIdventa();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }

    function edit(Venta $objeto){        
        $consultaSql = "update $this->tabla set fecha=:fecha, hora=:hora, pago=:pago, direnvio=:direnvio, nombre=:nombre, total=:total where idventa=:idventa;";
        $arrayConsulta["idventa"] = $objeto->getIdventa();
        $arrayConsulta["fecha"] = $objeto->getFecha();
        $arrayConsulta["hora"] = $objeto->getHora();
        $arrayConsulta["pago"] = $objeto->getPago();
        $arrayConsulta["direnvio"] = $objeto->getDirenvio();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["total"] = $objeto->getTotal();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function editPK(Venta $objetoNuevo, $idventapk){
        $consultaSql = "update $this->tabla set fecha=:fecha, hora=:hora, pago=:pago, direnvio=:direnvio, nombre=:nombre, total=:total where :idventa=:idventapk;";
        $arrayConsulta["idventa"] = $objetoNuevo->getId();
        $arrayConsulta["fecha"] = $objeto->getFecha();
        $arrayConsulta["hora"] = $objeto->getHora();
        $arrayConsulta["pago"] = $objeto->getPago();
        $arrayConsulta["direnvio"] = $objeto->getDirenvio();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["total"] = $objeto->getTotal();
        $arrayConsulta["idventapk"] = $idventapk;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($id){
        $consultaSql = "select * from $this->tabla where idventa=:idventa";
        $arrayConsulta["idventa"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $producto = new Venta();
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
                $producto = new Venta();
                $producto->set($fila);
                $list[] = $producto;
            }
        }else{
            return null;
        }
        return $list;
    }
}