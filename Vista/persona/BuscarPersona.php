<?php
include_once("../../configuracion.php");

include_once ("../estructura/cabecera.php");

?>
<h3>Buscar Datos Persona</h3>
<form action="../accion/accionBuscarPersona.php" method="post" id="buscarPersona">
    <div class="form-group mb-2 col-4">
        <label class="form-label" for="NroDni">Ingrese el Dni</label>
        <input class="form-control" type="text" name="NroDni" id="NroDni" required>
    </div>
    <div class="form-group mb-2">
        <input class="btn btn-success" type="submit" value="Buscar">
    </div>
</form>
<?php
    include_once ("../estructura/pie.php");
?>