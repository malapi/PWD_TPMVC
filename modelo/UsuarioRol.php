<?php 
class UsuarioRol extends BaseDatos 
{
    private $objusuario;
    private $objrol;
   
    
    private $mensajeoperacion;

   
    public function __construct(){
        parent::__construct();
        $this->objusuario=new Usuario();
        $this->objrol= new Rol();
       }
    public function setear($objusuario, $objrol)
    {
        $this->setobjusuario($objusuario);
        $this->setobjrol($objrol);
       
    }

    public function setearConClave($idusuario, $idjrol)
    {
        $this->getobjrol()->setidrol($idjrol);
        $this->getobjusuario()->setidusuario($idusuario);
    }

    public function getobjusuario(){  return $this->objusuario;}
    public function setobjusuario($objusuario){     $this->objusuario = $objusuario;    }
    public function getobjrol(){      return $this->objrol;     }
    public function setobjrol($objrol){  $this->objrol = $objrol;    }
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    public function cargar(){
        $resp = false;
        $sql="SELECT * FROM usuariorol WHERE idrol = ".$this->getobjrol()->getidrol()." AND idusuario = ".$this->getobjusuario()->getidusuario().";";
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $this->Registro();
                    
                    $obj1 = new Usuario();
                    $obj1->setidusuario($row['idusuario']);
                    $obj1->cargar();
                    $obj2 = new Rol();
                    $obj2->setidrol($row['idrol']);
                    $obj2->cargar();
                    $this->setear($obj1,$obj2);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Especies->listar: ".$this->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $sql="INSERT INTO usuariorol(idrol,idusuario)  VALUES(".$this->getobjrol()->getidrol().",".$this->getobjusuario()->getidusuario().");";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
               // $this->setidrol($elid);
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
        return $resp;
    }



    public function eliminar(){
        $resp = false;
        $sql="DELETE FROM usuariorol WHERE idrol=".$this->getobjrol()->getidrol()." AND idusuario =".$this->getobjusuario()->getidusuario().";";
        if ($this->Iniciar()) {
            //echo $sql;
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
        $sql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        if ($this->Iniciar()) {
           // echo $sql;
        $res = $this->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $this->Registro()){
                    $obj= new UsuarioRol();
                    
                    $obj->getobjusuario()->setidusuario($row['idusuario']);
                    $obj->getobjrol()->setidrol($row['idrol']);
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