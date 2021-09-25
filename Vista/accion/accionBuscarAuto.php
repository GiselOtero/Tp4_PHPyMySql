<?php
include_once("../../configuracion.php");
include_once ("../estructura/cabecera.php");
$datos=data_submitted();
$objAbmAuto=new AbmAuto();
$listaAuto=$objAbmAuto->buscar($datos);

?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">Patente</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <!-- <th scope="col"></th> -->
          
        </tr>
    </thead>
    <?php
    if(count($listaAuto)==1){
        $objAuto=$listaAuto[0];
        echo '<tr>';
        echo '<td >'.$objAuto->getPatente().'</td>';
        echo '<td>'.$objAuto->getMarca().'</td>';
        echo '<td>'.$objAuto->getModelo().'</td>';
        echo '<td>'.$objAuto->getDniDuenio()->getApellido().'</td>';
        echo '<td>'.$objAuto->getDniDuenio()->getNombre().'</td>';
        echo '</tr>';
    }else{
        echo '<h3>No se ha encontrado datos de la patente: '.$datos['Patente'].'</h3>';
    }
    ?>

</table>
<?php
    include_once ("../estructura/pie.php");
?>