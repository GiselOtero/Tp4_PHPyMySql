<?php
include_once("../../configuracion.php");

include_once ("../estructura/cabecera.php");

$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$listaPersona=$objAbmPersona->buscar($datos);
?>
<table class="table table-info table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Nro Dni</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dommicilio</th>
        </tr>
    </thead>
    <?php
        if(count($listaPersona)==1){
            $unaPersona=$listaPersona[0];
            echo '<tr>';
            echo '<td ">'.$unaPersona->getNroDni().'</td>';
            echo '<td ">'.$unaPersona->getApellido().'</td>';
            echo '<td ">'.$unaPersona->getNombre().'</td>';
            echo '<td ">'.$unaPersona->getFechaNac().'</td>';
            echo '<td ">'.$unaPersona->getTelefono().'</td>';
            echo '<td ">'.$unaPersona->getDomicilio().'</td>';
            echo '</tr>';
        }else{
            $resp=false;
        }
    ?>
</table>
<div>
    <form method="post" action="ActualizarDatosPersona.php">
        <div class="form-group mb-2">
            <label class="form-label" for="NroDni">NroDni</label>
            <input class="form-control" id="NroDni" readonly name="NroDni" width="80" type="text"
                value="<?php echo $unaPersona->getNroDni()?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="Apellido">Apellido</label>
            <input class="form-control" id="Apellido" name="Apellido" value="<?php echo $unaPersona->getApellido()?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="Nombre">Nombre</label>
            <input class="form-control" id="Nombre" name="Nombre" type="text" value="<?php echo $unaPersona->getNombre()?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="fechaNac">Fecha Nacimiento</label>
            <input class="form-control" id="fechaNac" name="fechaNac" type="date" value="<?php echo $unaPersona->getFechaNac()?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="Telefono">Telefono</label>
            <input class="form-control" id="Telefono" name="Telefono" type="tel" placeholder="000-0000000" pattern="[0-9]{3}-[0-9]{7}"value="<?php echo $unaPersona->getTelefono()?>">
        </div>
        <div class="form-group mb-2">
            <label class="form-label" for="Domicilio">Domicilio</label>
            <input class="form-control" id="Domicilio" name="Domicilio" type="text" value="<?php echo $unaPersona->getDomicilio()?>">
        </div>
        <div class="form-group mb-2">
            <input class="form-control" id="accion" name="accion" value="editar" type="hidden">
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </form>
</div>
<?php
    include_once ("../estructura/pie.php");
?>