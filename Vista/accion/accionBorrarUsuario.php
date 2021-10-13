<?php
include_once("../../configuracion.php");

include_once("../estructura/cabecera.php");
$objRol = new AbmRol();
$listaRoles = $objRol->buscar(null);
$datos = data_submitted();
$objAbmAbmUsuario = new AbmUsuario();
$listaUsuario = $objAbmAbmUsuario->buscar($datos);

?>
<table class="table table-info table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Mail</th>
            <th scope="col">Contraseña</th>
        </tr>
    </thead>
    <?php
    if (count($listaUsuario) == 1) {
        $unUsuario = $listaUsuario[0];
        echo '<tr>';
        echo '<td ">' . $unUsuario->getIdusuario() . '</td>';
        echo '<td ">' . $unUsuario->getUsnombre() . '</td>';
        echo '<td ">' . $unUsuario->geetUsmail() . '</td>';
        echo '<td ">' . $unUsuario->getUspass() . '</td>';
        echo '</tr>';
    } else {
        $resp = false;
    }
    ?>
</table>
<div>
    <form method="post" action="ActualizarDatosUsuario.php">
        <div class="form-group mb-2">
            <label class="form-label" for="idusuario">Id Usuario</label>
            <input class="form-control" id="idusuario" readonly name="idusuario" width="80" type="text" value="<?php echo $unUsuario->getIdusuario() ?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="usnombre">Nombre</label>
            <input class="form-control" id="usnombre" name="usnombre" value="<?php echo $unUsuario->getUsnombre() ?>" readonly>
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="uspass">Contraseña</label>
            <input class="form-control" id="uspass" name="uspass" type="text" value="<?php echo $unUsuario->getUspass() ?>" readonly>
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="usmail">Mail</label>
            <input class="form-control" id="usmail" name="usmail" type="email" value="<?php echo $unUsuario->geetUsmail() ?>" readonly>
        </div>
        <div class="form-group mb-2 col-4">
            <label>Permisos</label>
            <select id="multiple" class="js-states form-control" name="roles[]" multiple disabled>
                <?php
                foreach ($listaRoles as $rol) {
                    echo '<option value="' . $rol->getIdRol() . '">' . $rol->getRodescripcion() . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <input class="form-control" id="accion" name="accion" value="editar" type="hidden">
            <input class="form-control" id="usdeshabilitado" name="usdeshabilitado" value="<?= date("Y/m/d") ?>" type="hidden">

            <input type="submit" class="btn btn-danger" value="Eliminar">
        </div>
    </form>
</div>
<?php
include_once("../estructura/pie.php");
?>