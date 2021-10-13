<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
?>
<h3>Nuevo Rol</h3>
<form method="post" action="../accion/accionNuevoRol.php" id="nuevoRol">
    <div class="form-group mb-2 col-4">
        <label class="form-label">Descripcion Rol</label>
        <input class="form-control" id="rodescripcion" name="rodescripcion" type="text" required />
    </div>

    <div class="form-group mb-2 col-4">
        <input id="accion" name="accion" value="nuevo" type="hidden" />
        <a class="btn btn-primary" href="../rol/listaRol.php">Volver</a>
        <input class="btn btn-primary" type="submit" value="Crear" />
    </div>
</form>
<?php
include_once("../estructura/pie.php");
?>