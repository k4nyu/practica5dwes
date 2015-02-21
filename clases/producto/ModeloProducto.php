<?php

class ModeloProducto {
    private $bd;
    private $tabla = "producto";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(Producto $objeto){
        $consultaSql = "insert into $this->tabla values(:idproducto, :nombre, :descripcion, :precio, :iva);";
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["descripcion"] = $objeto->getDescripcion();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function delete(Producto $objeto){
        $consultaSql = "delete from $this->tabla where idproducto=:idproducto";
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }

    function edit(Producto $objeto){        
        $consultaSql = "update $this->tabla set nombre=:nombre, precio=:precio, descripcion=:descripcion, precio=:precio, iva=:iva where idproducto=:idproducto;";
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["descripcion"] = $objeto->getDescripcion();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    function editPK(Producto $objetoNuevo, $idproductopk){
        $consultaSql = "update $this->tabla set nombre=:nombre, precio=:precio, descripcion=:descripcion, precio=:precio, iva=:iva where :idproducto=:idproductopk;";
        $arrayConsulta["idproducto"] = $objeto->getIdproducto();
        $arrayConsulta["nombre"] = $objeto->getNombre();
        $arrayConsulta["descripcion"] = $objeto->getDescripcion();
        $arrayConsulta["precio"] = $objeto->getPrecio();
        $arrayConsulta["iva"] = $objeto->getIva();
        $arrayConsulta["idproductopk"] = $idproductopk;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($id){
        $consultaSql = "select * from $this->tabla where idproducto=:idproducto";
        $arrayConsulta["idproducto"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $producto = new Producto();
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
                $producto = new Producto();
                $producto->set($fila);
                $list[] = $producto;
            }
        }else{
            return null;
        }
        return $list;
    }
}