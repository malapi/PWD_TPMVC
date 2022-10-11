<?php 
class Tigre extends BaseDatos 
{
    private $id;
    private $nombre;
    private $objespecie;
    private $edad;
    private $peso;
    private $mensajeoperacion;
    
   
    public function __construct(){
        parent::__construct();
        $this->id="";
        $this->nombre="";
        $this->objespecie=null;
        $this->edad=0;
        $this->peso=0;
        $this->mensajeoperacion ="";
    }
    public function setear($elId, $elNombre, $laEspecie, $laEdad, $elPeso)
    {
        $this->setId($elId);
        $this->setNombre($elNombre);
        $this->setEspecie($laEspecie);
        $this->setEdad($laEdad);
        $this->setPeso($elPeso);

    }
    
    
    
    public function getId(){
        return $this->id;
        
    }
    public function setId($valor){
        $this->id = $valor;
    }
    
    public function getNombre(){
        return $this->nombre;
        
    }
    public function setNombre($valor){
        $this->nombre = $valor;
        
    }

    public function getEdad(){
        return $this->edad;

    }
    public function setEdad($valor){
        $this->edad = $valor;

    }
    /**
     * 
     * @return object
     */
    public function getEspecie(){
        return $this->objespecie;

    }
    public function setEspecie($valor){
        $this->objespecie = $valor;

    }
    public function getPeso(){
        return $this->peso;

    }
    public function setPeso($valor){
        $this->peso = $valor;

    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $sql="SELECT * FROM tigres WHERE idtigre = ".$this->getId();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $this->Registro();
                    $especie=new Especie();
                    $especie->setId($row['idespecie']);
                    $especie->cargar();

                    $this->setear($row['idtigre'], $row['nombre'], $especie, $row['edad'], $row['peso']);


                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$this->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $sql="INSERT INTO tigres(nombre, idespecie, edad, peso)  VALUES('".$this->getNombre()."',".
                $this->getEspecie()->getId().",".
                $this->getEdad().",".
                $this->getPeso().");";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$this->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $sql="UPDATE tigres SET nombre='".$this->getNombre()."', ".
            " idEspecie=".$this->getEspecie()->getId().", ".
            " peso=".$this->getPeso().", ".
            " edad=".$this->getEdad().
            " WHERE idtigre=".$this->getId();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: ".$this->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $sql="DELETE FROM tigres WHERE idtigre=".$this->getId();
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: ".$this->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: ".$this->getError());
        }
        return $resp;
    }
    

    public function listar($parametro=""){
        $arreglo = array();
        $sql="SELECT * FROM tigres ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        if ($this->Iniciar()) {
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $this->Registro()){
                    $obj= new Tigre();
                    $especie=new Especie();
                    $especie->setId($row['idespecie']);
                    $especie->cargar();
                     $obj->setear($row['idtigre'], $row['nombre'], $especie, $row['edad'], $row['peso']);

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