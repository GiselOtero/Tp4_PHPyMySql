<?php
include_once "../../configuracion.php";
include_once("../estructura/cabecera.php");
?>

<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Bienvenido!!  <?php echo $_SESSION['usnombre']?></h4>
        <p class="card-text">
            <a class="btn btn-primary" href="../accion/cerrarSession.php">Cerrar Sesion</a>
        </p>
    </div>
</div>


<?php
include_once("../estructura/pie.php");
?>