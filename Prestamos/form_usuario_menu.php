<?php include("conect.php"); ?>

<?php include('includes/header3.php'); ?>

     
<div class="container p-4">
    <?php 
        $rfc= $_SESSION['rfc'];
        echo "BIENVENIDO_USUARIO REGISTRADO ",$rfc;
    ?>
    <div class="form group mx-auto">
        <img src="https://image.flaticon.com/icons/png/512/3135/3135715.png" width="200" >
    </div>   
 </div>    
 
 <div class="container">
 <div class="row">
 <div class="col">

    <div class= "card border-primary card text-white bg-dark card-body">
    <div class="card-body text-dark">
    <form action="form_regPrestamo.php" method="POST">
        <div class="container p-4">
            <input type="submit" name="sol_prestamo" class="btn btn-success btn-block" value="Solicitar prestamo">
        </div>
    </form>

    <form action="form_historial_prestamos.php" method="POST">
        <div class="container p-4">
            <input type="submit" name="sol_prestamo" class="btn btn-success btn-block" value="Historial de prestamos">
        </div>
    </form>

    <form action="form_historial_abonos.php" method="POST">
        <div class="container p-4">
            <input type="submit" name="sol_prestamo" class="btn btn-success btn-block" value="Historial de abonos">
        </div>
    </form>

    </div><!-- Card card-body -->
    </div><!-- Card card-body text-dark-->
</div><!-- col-6 -->
</div><!-- row -->
</div><!-- container -->
    
    

<?php include('includes/footer.php'); ?>