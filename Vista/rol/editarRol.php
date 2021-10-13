<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
$objRol = new AbmRol();
$datos = data_submitted();
$listaRoles = $objRol->buscar($datos);
$unRol = $listaRoles[0];
?>
<h3>Editar Rol</h3>
<form method="post" action="../accion/ActualizarDatosRol.php" id="editRol">
    <div class="form-group mb-2 col-4">
        <label class="form-label">Descripcion Rol</label>
        <input class="form-control" id="rodescripcion" name="rodescripcion" type="text" value="<?php echo $unRol->getRodescripcion() ?>" required />
    </div>

    <div class="form-group mb-2 col-4">
        <input id="accion" name="accion" value="editar" type="hidden" />
        <input id="idrol" name="idrol" value="<?php echo $unRol->getIdrol() ?>" type="hidden" />
        <input class="btn btn-primary" type="submit" value="Editar" />
    </div>
</form>
<?php
include_once("../estructura/pie.php");
?>