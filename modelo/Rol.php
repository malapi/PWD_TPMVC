<?php 
class Rol extends BaseDatos 
{
    private $idrol;
    private $rodescripcion;
   
    
    private $mensajeoperacion;

   
    public function __construct(){
        parent::__construct();
        $this->idrol="";
        $this->rodescripcion="";
       }
    public function setear($idrol, $rodescripcion)
    {
        $this->setidrol($idrol);
        $this->setrodescripcion($rodescripcion);
       
    }

    public function getidrol(){  return $this->idrol;}
    public function setidrol($idrol){     $this->idrol = $idrol;    }
    public function getrodescripcion(){      return $this->rodescripcion;     }
    public function setrodescripcion($rodescripcion){  $this->rodescripcion = $rodescripcion;    }
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
   
    public function cargar(){
        $resp = false;
        $sql="SELECT * FROM rol WHERE idrol = ".$this->getidrol();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $this->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Especies->listar: ".$this->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $sql="INSERT INTO rol(idrol,rodescripcion)  VALUES('".$this->getidrol()."','".$this->getrodescripcion()."');";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setidrol($elid);
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
        $sql="UPDATE rol SET rodescripcion='".$this->getrodescripcion()."' ".
            " WHERE idrol=".$this->getidrol();
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
        $sql="DELETE FROM rol WHERE idrol=".$this->getidrol();
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
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        if ($this->Iniciar()) {
            //echo $sql;
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $this->Registro()){
                    $obj= new Rol();
                    $obj->setidrol($row['idrol']);
                    $obj->cargar();
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