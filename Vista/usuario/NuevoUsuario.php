<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
$objRol = new AbmRol();
$listaRoles = $objRol->buscar(null);
?>
<h3>Nuevo Usuario</h3>
<form method="post" action="../accion/accionNuevoUsuario.php" id="nuevaUsuario">
    <div class="form-group mb-2 col-4">
        <label class="form-label">Nombre Usuario</label>
        <input class="form-control" id="usnombre" name="usnombre" type="text" required />
    </div>
    <div class="form-group mb-2 col-4">
        <label class="form-label">Mail</label>
        <input class="form-control" id="usmail" name="usmail" type="email" required />
    </div>

    <div class="form-group mb-2 col-4">
        <label class="form-label">Contraseña</label>
        <input class="form-control" id="uspass" name="uspass" type="text" required />
    </div>

    <div class="form-group mb-2 col-4">
        <label>Permisos</label>
        <select id="multiple" class="js-states form-control" name="roles[]" multiple>
            <?php
            foreach ($listaRoles as $rol) {
                echo '<option value="' . $rol->getIdRol() . '">' . $rol->getRodescripcion() . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group mb-2 col-4">
        <input id="accion" name="accion" value="nuevo" type="hidden" />
        <input class="btn btn-primary" type="submit" value="Crear" />
    </div>
</form>
<?php
include_once("../estructura/pie.php");
?>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script> -->