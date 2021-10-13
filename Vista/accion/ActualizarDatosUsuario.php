<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
$datos = data_submitted();
$objAbmUsuario = new AbmUsuario();
if ($datos['accion'] == 'editar') {
    if ($objAbmUsuario->modificacion($datos)) {
        $resp = true;
    }
    if ($resp) {
        $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
    } else {
        $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
    }
}
?>
<h3>Usuario</h3>
<h4><?php echo $mensaje; ?></h4>
<a class="btn btn-primary" href="../usuario/listaUsuario.php">Volver a la Lista</a>

<?php
include_once("../estructura/pie.php");
?>