<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
$objUsuario = new AbmUsuario();
$objUsuarioRol = new AbmUsuarioRol();
$listaUsuarios = $objUsuario->buscar(null);
// $listaUsuarioRol = $objUsuarioRol->buscar($objUsuario->getIdusuario());

?>
<h3>Listado Usuarios</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Mail</th>
            <th scope="col">Permisos</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php
    if (count($listaUsuarios) > 0) {
        foreach ($listaUsuarios as $objUsuario) {
            if ($objUsuario->getDeshabilitado() == NULL || $objUsuario->getDeshabilitado() == "0000-00-00 00:00:00") {
                echo '<tr>';
            } else {
                echo '<tr class="table-danger">';
            }
            echo '<td ">' . $objUsuario->getUsnombre() . '</td>';
            echo '<td ">' . $objUsuario->getUspass() . '</td>';
            echo '<td ">' . $objUsuario->geetUsmail() . '</td>';
            echo '<td></td>';
            //echo '<td><a href="../accion/autosPersona.php?DniDuenio=' . $objUsuario->getNroDni() . '">Mostrar Lista de auto</a></td>';
            echo '<td><a href="../accion/accionBuscarUsuario.php?idusuario=' . $objUsuario->getIdusuario() . '"">
            <button type="button" class="btn btn-primary"><i class="fas fa-pen" aria-hidden="true"></i></button></a></td>';
            echo '<td><a href="../accion/accionBorrarUsuario.php?idusuario=' . $objUsuario->getIdusuario() . '">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
            </a></td>';
            echo '</tr>';
        }
    } else {
        echo '<h4>Aun no hay Usuarios cargados en la base</h4>';
    }
    ?>
</table>
<?php
include_once("../estructura/pie.php");
?>