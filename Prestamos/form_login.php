<?php include("conect.php"); ?>

<?php include('includes/header2.php'); ?>
 
<div class="container p-4">
</div>
 
<div class="container">
        <form action="login.php" method="POST">
            <div class="row">
            <div class="col-md-6 mx-auto"> 

            <!-- MESSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>

            <div class="card border-primary card text-white bg-dark card-body">
            <h5 class="card-title">Inicio de sesión</h5> <!-- Recuadro informacion personal -->

            <div class="container p-4">
                <div class="form group mx-auto">
                    <img src="https://image.flaticon.com/icons/png/512/3135/3135715.png" width="150" >
                </div>  
            </div>                 
                
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">RFC</label>
                <div class="col-sm-6">
                    <input type="text" name="lblRFC" class="form-control" placeholder="RFC" autofocus required> 
                </div>
                </div>
            </div> 
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="password" name="lblContra" class="form-control" placeholder="Contraseña" autofocus required>
                </div>
                </div>
            </div> 

            <div class="container p-4">
                <input type="submit" name="iniciar_sesion" class="btn btn-success btn-block" value="Iniciar sesión">
            </div>

            </div>

            </div><!---class row--->
        </form>
    </div><!--- class container---> 


<?php include('includes/footer.php'); ?>