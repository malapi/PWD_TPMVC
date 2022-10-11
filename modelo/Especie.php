<?php 
class Especie extends BaseDatos 
{
    private $id;
    private $especie;
    private $mensajeoperacion;

   
    public function __construct(){
        parent::__construct();
        $this->id="";
        $this->especie="";
        $this->mensajeoperacion ="";
    }
    public function setear($elId, $laDesripcion)
    {
        $this->setId($elId);
        $this->setDescripcion($laDesripcion);
    }
    
    
    
    public function getId(){
        return $this->id;
        
    }
    public function setId($valor){
        $this->id = $valor;
    }
    

    public function getDescripcion(){
        return $this->especie;

    }
    public function setDescripcion($valor){
        $this->especie = $valor;

    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $sql="SELECT * FROM especies WHERE idespecie = ".$this->getId();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $this->Registro();
                    $this->setear($row['idespecie'], $row['especie']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Especies->listar: ".$this->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $sql="INSERT INTO especies(especie)  VALUES('".$this->getDescripcion()."');";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Especie->insertar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Especie->insertar: ".$this->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $sql="UPDATE especies SET especie='".$this->getDescripcion()."' ".
            " WHERE idespecie=".$this->getId();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Especie->modificar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Especie->modificar: ".$this->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $sql="DELETE FROM especies WHERE idespecie=".$this->getId();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Especie->eliminar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Especie->eliminar: ".$this->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $sql="SELECT * FROM especies ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        if ($this->Iniciar()) {
            //echo $sql;
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $this->Registro()){
                    $obj= new Especie();
                    $obj->setear($row['idespecie'], $row['especie']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        }
        else {
           $this->setmensajeoperacion("Especie->listar: ".$this->getError());
        }
        }
        return $arreglo;
    }
    
}


?>