<?php include("conect.php"); ?>

<?php include('includes/header2.php'); ?>

<div class="container p-4">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['message']); } ?>

    <form action="registrar_client.php" method="POST">
        <div class="row">
    
            <div class="col-md-6">
            <div class="card border-warning card text-white bg-dark card-body">
            <h5 class="card-title">Información personal</h5> <!-- Recuadro informacion personal -->
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">RFC</label>
                <div class="col-sm-6">
                    <input type="text" name="rfc" class="form-control" required placeholder="RFC" autofocus> 
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" name="lblContra" class="form-control"required placeholder="Contraseña" autofocus> 
                </div>
                </div>
            </div> 
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" name="nombre" class="form-control" required placeholder="Nombre" autofocus>
                </div>
                </div>
            </div> 

            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" name="ap_paterno" placeholder="Apellido paterno" required>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" name="ap_materno" placeholder="Apellldo materno" required>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="f_nacimiento" required autofocus>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label">Telefono personal</label>
                            <input type="number" class="form-control" name="tel_personal" placeholder="Telefono personal" min="0" max="9999999999" required>
                        </div>
                    </div><!-- row-g-3 -->
                </div><!-- card-body -->
            </div><!-- row g-3 -->

        <div class="card border-info card text-white bg-dark card-body">
        <h5 class="card-title">Información de domicilio</h5> <!-- Recuadro informacion domicilio -->

        <div class="row g-3">
                <div class="col-sm-6">
                    <label for="" class="form-label">Pais</label>
                    <input type="text" class="form-control" name="pais" placeholder="Pais" required>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="estado" placeholder="Estado" required>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Municipio</label>
                            <input type="text" class="form-control" name="municipio" placeholder="Municipio" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label">Codigo postal</label>
                            <input type="number" class="form-control" name="cod_postal" placeholder="Codigo postal" min="0" max="9999999" required>
                        </div>
                    </div><!-- row-g-3 -->
                </div><!-- card-body -->
        </div><!-- row g-3 -->

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Calle</label>
                <div class="col-sm-8">
                    <input type="text" name="calle" class="form-control" placeholder="Calle" autofocus>
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Colonia</label>
                <div class="col-sm-8">
                    <input type="text" name="colonia" class="form-control" placeholder="Colonia" autofocus>
                </div>
                </div>
            </div> 

            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="" class="form-label">No. Interior</label>
                    <input type="number" class="form-control" name="num_interior" min="0" max="9999" placeholder="No. Interior" required>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">No. Exterior</label>
                    <input type="number" class="form-control" name="num_exterior" min="0" max="9999" placeholder="No.exterior" required>
                </div>
            </div>
            </div><!-- card card-body INFORMACION DOMICILIO -->

            </div><!-----separacion card 1 lado izquierdo--->
        </div>

        
        <div class="col-md-6">
            <div class="card border-warning card text-white bg-dark card-body">
            <h5 class="card-title">Información laboral</h5> <!-- Recuadro informacion laboral -->
               
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Nombre de empresa</label>
                <div class="col-sm-6">
                    <input type="text" name="nom_empresa" class="form-control" placeholder="nombre de empresa" autofocus> 
                </div>
                </div>
            </div> 
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Codigo postal</label>
                <div class="col-sm-6">
                    <input type="number" name="cp_emp" class="form-control" min="0" max="999999" placeholder="Codigo postal de empresa" autofocus> 
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Puesto</label>
                <div class="col-sm-6">
                    <input type="text" name="puesto" class="form-control" placeholder="Puesto" autofocus> 
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Salario</label>
                <div class="col-sm-6">
                    <input type="number" name="salario_mens" class="form-control" min="0" max="999999" placeholder="Salario mensual" autofocus> 
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Telefono de empresa</label>
                <div class="col-sm-6">
                    <input type="number" name="tel_empresa" class="form-control" min="0" max="9999999999" placeholder="Telefono de empresa" autofocus> 
                </div>
                </div>
            </div> 
        
        <div class="container p-3">
        </div>
        <div class="card border-primary card text-white bg-dark card-body">
        <h5 class="card-title">Referencias personales</h5> <!-- Recuadro informacion domicilio -->

        <div class="row g-3">
                <div class="col-sm-6">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nomb_ref1" placeholder="Nombre" required>
                </div>

                <div class="col-sm-6">
                    <label for="" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="ap_mat1" placeholder="Apellido Materno" required>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Apellido paterno</label>
                            <input type="text" class="form-control" name="ap_pat1" placeholder="Apellido Paterno" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="tel_ref1" placeholder="Telefono" min="0" max="9999999999" required>
                        </div>
                    </div><!-- row-g-3 -->
                </div><!-- card-body -->

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nomb_ref2" placeholder="Nombre" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="ap_mat2" placeholder="Apellido materno" min="0" max="9999999999" required>
                        </div>
                    </div><!-- row-g-3 -->
                </div><!-- card-body -->

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Apellido paterno</label>
                            <input type="text" class="form-control" name="ap_pat2" placeholder="Apellido paterno" required>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="tel_ref2" placeholder="Telefono" min="0" max="9999999999" required>
                        </div>
                    </div><!-- row-g-3 -->
                </div><!-- card-body -->

        </div><!-- row g-3 -->
        </div><!-- card card-body INFORMACION DOMICILIO -->

            </div><!-----separacion card 2 lado derecho--->
        </div>
      
        </div><!---ROW-->
        <div class="container p-4">
        <input type="submit" name="guardar" class="btn btn-success btn-block" value="GUARDAR">
        </div>
    </form>
  </div> 

<?php include('includes/footer.php'); ?>