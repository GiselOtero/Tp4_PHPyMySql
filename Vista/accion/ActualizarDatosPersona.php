<?php
include_once("../../configuracion.php");
include_once ("../estructura/cabecera.php");
$datos=data_submitted();
$objAbmPersona=new AbmPersona();
if($datos['accion']=='editar'){
    if($objAbmPersona->modificacion($datos)){
        $resp = true;
    }
}
if($resp){
    $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
}else {
    $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
}
?>
 <h3>Auto</h3>
    <h4><?php echo $mensaje; ?></h4>

<?php
    include_once ("../estructura/pie.php");
?>