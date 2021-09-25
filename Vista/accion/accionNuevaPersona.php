<?php 
include_once '../../configuracion.php';
include_once ("../estructura/cabecera.php");
$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$buscarPersona['NroDni']=$datos['NroDni'];
$listaPersona=$objAbmPersona->buscar($buscarPersona);
$respuesta="";

if(count($listaPersona)>0){
    $respuesta.="<h4>La Dni ya existe en la base</h4>";
}else{
    if($datos['accion']=='nuevo'){
        if($objAbmPersona->alta($datos)){
            $respuesta.="La accion ".$datos['accion']." se realizo correctamente.";
        }else{
            $respuesta.="La accion ".$datos['accion']." no pudo concretarse.";
        }
        
    }
}

?>
<h3>Persona</h3>
<h4><?php echo $respuesta ?></h4>
<a href="../persona/listaPersonas.php">Lista</a>
<?php
    include_once ("../estructura/pie.php");
?>