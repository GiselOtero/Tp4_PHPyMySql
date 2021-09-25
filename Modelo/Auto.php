<?php 
include_once("Persona.php");
class Auto {
    private $patente;
    private $marca;
    private $modelo;
    private $dniduenio;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->patente="";
        $this->marca="";
        $this->modelo="";
        $this->dniduenio="";
        $this->mensajeoperacion ="";
    }
    public function setear($patente,$marca,$modelo,$dni)    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dni);
    }
    
    
    public function getPatente(){
        return $this->patente;
        
    }
    public function setPatente($valor){
        $this->patente = $valor;
        
    }
    
    public function getMarca(){
        return $this->marca;
        
    }
    public function setMarca($valor){
        $this->marca = $valor;
        
    }
    
    public function getModelo(){
        return $this->modelo;
        
    }
    public function setModelo($valor){
        $this->modelo = $valor;
        
    }

    public function getDniDuenio(){
        return $this->dniduenio;
        
    }
    public function setDniDuenio($valor){
        $this->dniduenio = $valor;
        
    }

    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['Patente'], $row['Marca'],$row['Modelo'],$row['DniDuenio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO auto(Patente,Marca,Modelo,DniDuenio)  VALUES('".$this->getPatente()."','".$this->getMarca()."',".$this->getModelo().",'".$this->getDniDuenio()."');";
        if ($base->Iniciar()) {
            
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE auto SET Marca='".$this->getMarca()."',Modelo=".$this->getModelo().",DniDuenio='".$this->getDniDuenio()->getNroDni()."' WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM auto WHERE Patente=".$this->getPatente();
        //print_r($sql);
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                //echo "eliminar";
                return true;
            } else {
                $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $objDuenio= new Persona();
                    $objDuenio->setNroDni($row['DniDuenio']);
                    $objDuenio->cargar();
                    $obj->setear($row['Patente'], $row['Marca'],$row['Modelo'],$objDuenio);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Auto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>