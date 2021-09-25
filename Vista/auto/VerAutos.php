<?php
    include_once "../../configuracion.php";
    include_once "../estructura/cabecera.php";
    $objAbmAuto= new AbmAuto();
    $listaAuto=$objAbmAuto->buscar(null);
?>

<h3>Listado de Autos</h3>
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">Patente</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre</th>
          <th scope="col"></th>
          
        </tr>
    </thead>
    <?php
    if(count($listaAuto)>0){
        foreach($listaAuto as $objAuto){
            echo '<tr>';
            echo '<td >'.$objAuto->getPatente().'</td>';
            echo '<td>'.$objAuto->getMarca().'</td>';
            echo '<td>'.$objAuto->getModelo().'</td>';
            echo '<td>'.$objAuto->getDniDuenio()->getApellido().'</td>';
            echo '<td>'.$objAuto->getDniDuenio()->getNombre().'</td>';
            /* echo '<td><a href="fauto_editar.php?Patente='."'".$objAuto->getPatente()."'".'"">editar</a></td>'; */
            echo '<td><a href="../accion/eliminarAuto.php?accion=borrar&Patente='."'".$objAuto->getPatente()."'".'">borrar</a></td>';
            echo '</tr>'; 
        }
    }else{
        echo '<h4>Aun no hay Autos cargados</h4>';
        
    }
    ?>
</table>
<?php
    include_once ("../estructura/pie.php");
?>