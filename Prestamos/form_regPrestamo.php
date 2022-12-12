<?php include("conect.php"); ?>

<?php include('includes/header3.php'); ?>

<div class="container p-4">
</div>
    <div class="container p-4">
    <!-- MESSAGES -->

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['message']); } ?>


        <form action="form_regPrestamo2.php" method="POST">
            <div class="row">

            <div class="col-md-6">
            <div class="card border-primary card text-white bg-dark card-body">
            <h5 class="card-title">Usuario <?php echo $_SESSION['rfc'] ?></h5>
            <h5 class="card-title">Solicitud de prestamo</h5> <!-- Recuadro informacion personal -->
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">RFC</label>
                <div class="col-sm-6">
                    <input type="text" name="rfc" class="form-control" placeholder="RFC" autofocus value=<?php echo $_SESSION['rfc'] ?> disabled> 
                </div>
                </div>
            </div> 
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Cantidad solicitada</label>
                <div class="col-sm-6">
                    <input type="number" name="cant_prestamo" class="form-control" min=10000 autofocus>
                </div>
                </div>
            </div> 

        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">Periodo de pagos</label>
            <div class="col-sm-6">
                <select class="form-control" name="slc_periodo">
                    <option value= 0>Elija el periodo de pago</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Quincenal">Quincenal</option>
                    <option value="Mensual">Mensual</option>
                </select>
            </div>
            </div>
        </div>  

        <div class="container p-4">
        <input type="submit" name="reg_prestamo" class="btn btn-success btn-block" value="SIGUIENTE">
        </div>        

            </div><!---class row--->
        </form>
</div><!-- container -->


<?php include('includes/footer.php'); ?>