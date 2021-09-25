<?php
    include_once "../../configuracion.php";
    include_once "../estructura/cabecera.php";

?>
<h3>Buscar Auto </h3>
<form action="../accion/accionBuscarAuto.php" method="get" id="buscarAuto">
    <div class="form-group mb-3 col-4">
        <label class="form-label" for="Patente">Ingrese la Patente</label>
        <input class="form-control" type="text" name="Patente" id="Patente" required>
    </div>
    <div class="form-group mb-3">
        <input class="btn btn-success" type="submit" value="Buscar">
    </div>
</form>
<?php
    include_once ("../estructura/pie.php");
?>