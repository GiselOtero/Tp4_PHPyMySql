<?php
include_once '../../configuracion.php';
include_once("../estructura/cabecera.php");
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
$respuesta = "";

if ($datos['accion'] == 'nuevo') {
    if ($objAbmUsuario->alta($datos)) {
        $respuesta .= "La accion " . $datos['accion'] . " se realizo correctamente.";
    } else {
        $respuesta .= "La accion " . $datos['accion'] . " no pudo concretarse.";
    }
}

?>
<h3>Usuarios</h3>
<h4><?php echo $respuesta ?></h4>
<a href="../usuarios/listaUsuario.php">Lista</a>
<?php
include_once("../estructura/pie.php");
?>