<?php
include_once("../../configuracion.php");
include_once("../estructura/cabecera.php");
?>
<div class="container-fluid d-flex justify-content-center align-items-center" style="width: 100% !important; height: 100vh !important;">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Inicio Sesion</h5>
                        <form method="post" action="../accion/verificarLogin.php">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="usNombre" name="usNombre" placeholder="Tu Nombre">
                                <label for="floatingInput">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="usPass" name="usPass" placeholder="Password">
                                <label for="floatingPassword">Contraseña</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../estructura/pie.php");
?>