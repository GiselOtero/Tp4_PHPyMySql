<?php
include_once("../../configuracion.php");
include_once ("../estructura/cabecera.php");
?>
<h3>Nuevo Auto</h3>
<form action="../accion/accionNuevoAuto.php" method="post" id="nuevoAuto">
        <div class="form-group mb-2 col-4">
            <label class="form-label">Patente</label>
    		<input class="form-control" id="Patente" name="Patente" type="text" required/>
        </div>
		<div class="form-group mb-2 col-4">
		    <label class="form-label">Marca</label>
    		<input class="form-control" id="Marca" name="Marca" type="text"required/>
		</div>
		<div class="form-group mb-2 col-4">
		    <label class="form-label">Modelo</label>
    		<input class="form-control" id="Modelo" name="Modelo" type="text" required/>
		</div>
		<div class="form-group mb-2 col-4">
		    <label class="form-label">Dni Due&ntilde;o</label>
    		<input class="form-control" id="DniDuenio" name="DniDuenio" type="text" required/>
		</div>
		<div class="form-group mb-2 col-4">
		    <input id="accion" name="accion" value="nuevo" type="hidden"/>
    		<input class="btn btn-primary" type="submit" value="Crear" />
		</div>
</form>
<?php
    include_once ("../estructura/pie.php");
?>