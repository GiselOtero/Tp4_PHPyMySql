<?php
 include_once("../../configuracion.php");
 include_once ("../estructura/cabecera.php");
        $datos=data_submitted();
        $objAbmAuto = new AbmAuto();
        $listaAuto = $objAbmAuto->buscar($datos);

?>
<h3>Listado de Autos</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">Patente</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
        </tr>
    </thead>
    <?php
    if(count($listaAuto)>0){
        foreach($listaAuto as $objAuto){

            echo '<tr>';
            echo '<td >'.$objAuto->getPatente().'</td>';
            echo '<td>'.$objAuto->getMarca().'</td>';
            echo '<td>'.$objAuto->getModelo().'</td>';
        }
    }else{
        echo '<h4>Aun no hay Autos cargados</h4>';
        
    }
    ?>
</table>
<?php
    include_once ("../estructura/pie.php");
?>