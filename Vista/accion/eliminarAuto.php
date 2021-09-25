<?php 
include_once '../../configuracion.php';
include_once ("../estructura/cabecera.php");
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objTrans = new AbmAuto();
if (isset($datos['accion'])){
   
    if($datos['accion']=='borrar'){
        if($objTrans->baja($datos)){
            $resp =true;
        }
        
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    
}

?>
 <h3>Borrar Dato Auto</h3>
    <?php	
    echo $mensaje;
    ?>
    <br><a href="../auto/VerAutos.php">Ver lista Persona</a><br>
<?php
    include_once ("../estructura/pie.php");
?>