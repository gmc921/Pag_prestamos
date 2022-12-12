<?php include("conect.php"); ?>

<?php include('includes/header2.php'); ?>

    

    <?php 
    
    $rfc= $_SESSION['rfc'];

    echo "BIENVENIDO_USUARIO REGISTRADO ",$rfc;

    ?>
    
    <div class= card card-body>
    <form action="form_regPrestamo.php" method="POST">

    <div class="container p-4">
        <input type="submit" name="sol_prestamo" class="btn btn-success btn-block" value="Solicitar prestamo">
    </div>

    </form>
    </div><!-- Recuadro informacion personal -->
    
    

<?php include('includes/footer.php'); ?>