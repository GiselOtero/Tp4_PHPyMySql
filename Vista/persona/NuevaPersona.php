<?php
include_once("../../configuracion.php");
include_once ("../estructura/cabecera.php");
$datos=data_submitted();
$resp=false;
if(isset($datos['DniDuenio'])){
    $dni=$datos['DniDuenio'];
    $resp=true;
}
?>
<h3>Nueva Persona</h3>
<form method="post" action="../accion/accionNuevaPersona.php" id="nuevaPersona">
        <div class="form-group mb-2 col-4">
            <label class="form-label">Nro Dni</label>
            <!-- <input class="form-control" id="NroDni" name="NroDni" type="text"/> -->
            <?php
                if($resp){
                    echo '<input class="form-control" id="NroDni" name="NroDni" type="text" value="'.$dni.'"/>';
                }else{
                    echo '<input class="form-control" id="NroDni" name="NroDni" type="text" required/>';
                }
            ?>
        </div>
        <div class="form-group mb-2 col-4">
            <label class="form-label">Apellido</label>
            <input class="form-control" id="Apellido" name="Apellido" type="text" required/>
        </div>
        <div class="form-group mb-2 col-4">
            <label class="form-label">Nombre</label>
            <input class="form-control" id="Nombre" name="Nombre" type="text" required/>
        </div>
        <div class="form-group mb-2 col-4">
            <label class="form-label">Fecha Nacimiento</label>
            <input class="form-control" id="fechaNac" name="fechaNac" type="date" required/>
        </div>
        <div class="form-group mb-2 col-4">
            <label class="form-label">Telefono</label>
    		<!-- <input class="form-control" id="Telefono" name="Telefono" type="text"/> -->
            <input class="form-control" type="tel" id="Telefono" name="Telefono" placeholder="000-0000000" pattern="[0-9]{3}-[0-9]{7}" required>
        </div>
        <div class="form-group mb-2 col-4">
            <label class="form-label">Domicilio</label>
    		<input class="form-control" id="Domicilio" name="Domicilio" type="text" required/>
        </div>
        <div class="form-group mb-2 col-4">
            <input id="accion" name="accion" value="nuevo" type="hidden"/>
            <input class="btn btn-primary" type="submit" value="Crear"/>
        </div>
</form>
<?php
    include_once ("../estructura/pie.php");
?>