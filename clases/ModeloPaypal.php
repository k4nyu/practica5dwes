<?php
class ModeloPaypal {
    private $bd;
    private $tabla = "paypal";
    
    function __construct(BaseDatos $bd) {
        $this->bd = $bd;
    }
    
    function add(Paypal $objeto){
        $consultaSql = "insert into $this->tabla values(:idpaypal, :item_name, :verificado);";
        $arrayConsulta["idpaypal"] = $objeto->getIdpaypal();
        $arrayConsulta["item_name"] = $objeto->getItem_name();
        $arrayConsulta["verificado"] = $objeto->getVerificado();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getAutonumerico();
    }
    function delete(Paypal $objeto){
        $consultaSql = "delete from $this->tabla where iddetalleventa=:iddetalleventa";
        $arrayConsulta["iddetalleventa"] = $objeto->getIddetalleventa();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }

    function edit(Paypal $objeto){        
        $consultaSql = "update $this->tabla set idpaypal=:idpaypal, item_name=:item_name, verificado=:verificado where idpaypal=:idpaypal;";
        $arrayConsulta["idpaypal"] = $objeto->getIdpaypal();
        $arrayConsulta["item_name"] = $objeto->getItem_name();
        $arrayConsulta["verificado"] = $objeto->getVerificado();
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if(!$resultado){
            return -1;
        }
        return $this->bd->getNumeroFila();
    }
    
    function get($id){
        $consultaSql = "select * from $this->tabla where idpaypal=:idpaypal";
        $arrayConsulta["idpaypal"] = $id;
        $resultado = $this->bd->setConsulta($consultaSql, $arrayConsulta);
        if($resultado){
            $producto = new Paypal();
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
                $producto = new Paypal();
                $producto->set($fila);
                $list[] = $producto;
            }
        }else{
            return null;
        }
        return $list;
    }
}
