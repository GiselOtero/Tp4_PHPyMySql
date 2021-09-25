<?php
    include_once("../../configuracion.php");
    include_once ("../estructura/cabecera.php");
    $datos=data_submitted();
    $objAbmAuto = new AbmAuto();
    $objAbmPersona = new AbmPersona();
    $buscarAuto['Patente']=$datos['Patente'];
    $listaAuto = $objAbmAuto->buscar($buscarAuto);
    $respuesta="";
    $crear=false;
    if(count($listaAuto)>0){
        $respuesta.="<h4>La patente ya existe>/h4>";
        
    }else{
        $buscar['NroDni']=$datos['DniDuenio'];
        $listaPersona= $objAbmPersona->buscar($buscar);
        if(count($listaPersona)<=0){
            $respuesta= '<h4>No se encontro datos correspondientes al dni</h4>';
            $respuesta.= '<a href="../persona/NuevaPersona.php?DniDuenio='.$datos['DniDuenio'].'">Ingresar datos del Due&ntilde;o</a>';
        }else{
            $crear=true;
            
        }
    }

    if($datos['accion']=='nuevo' && $crear){
        if($objAbmAuto->alta($datos)){
            $respuesta.= '<h4>Se Guardo correctamente</h4>';
            $respuesta.= '<a href="../auto/VerAutos.php">Ver Lista Autos</a>';
        }else{
            $respuesta.='<h4>La accion '.$datos['accion'].' no pudo concretarse.</h4>';
        }
        
    }

?>
<h3>Lista de autos</h3>

    <?php
     echo $respuesta;
    ?>

<?php
    include_once ("../estructura/pie.php");
?>