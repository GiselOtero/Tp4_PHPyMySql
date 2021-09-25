<?php
include_once("../../configuracion.php");
include_once ("../estructura/cabecera.php");
$datos = data_submitted();
$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();
$resp=false;
//print_r($datos);

    $listaAuto= $objAbmAuto->buscar($datos);
    if(count($listaAuto)==1){
        $unAuto=$listaAuto[0];
        //print_r($unAuto);
        $listaPersona = $objAbmPersona->buscar($datos);
        if(count($listaPersona)==1){
            $unaPersona=$listaPersona[0];
            //print_r($unaPersona);
            $datos['Marca']=$unAuto->getMarca();
            $datos['Modelo']=$unAuto->getModelo();
            $datos['DniDuenio']=$unaPersona;
        }else{
            $respuesta='No hay datos de la persona';
        }
    }




    if($datos['accion']=='editar'){
        if($objAbmAuto->modificacion($datos)){
            $resp = true;
        }
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    echo "<h3>".$mensaje."</h3>";
?>
<?php
    include_once ("../estructura/pie.php");
?>
