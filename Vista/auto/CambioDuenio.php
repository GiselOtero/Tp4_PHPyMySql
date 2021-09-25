<?php
include_once("../../configuracion.php");
include_once "../estructura/cabecera.php";
?>
<h3>Cambiar Due&ntilde;o</h3>
<form action="../accion/accionCambioDuenio.php" method="post" id="cambioDuenio">
    <div class="form-group mb-2 col-4">
        <label class="form-label" for="Patente">Ingrese Patente</label>
        <input class="form-control" type="text" name="Patente" id="Patente" required>
    </div>
    <div class="form-group mb-2 col-4">
        <label class="form-label" for="NroDni">Ingrese Dni Due&ntilde;o</label>
        <input class="form-control" type="text" name="NroDni" id="NroDni" required>
    </div>
    <div class="form-group mb-2 col-4">
        <input id="accion" name="accion" value="editar" type="hidden">
		<input class="btn btn-primary" type="submit" value="Editar">
    </div>
</form>
<?php
    include_once ("../estructura/pie.php");
?>