<?php include("conect.php"); 

$rfc2=$_SESSION['rfc'];

if (isset($_POST['reg_prestamo'])){
    
if ($_POST['cant_prestamo'] <= 0) {
    $_SESSION['message'] = 'Elija la cantidad correcta';
    $_SESSION['message_type'] = 'danger';
    $_SESSION['rfc']; 
    header("Location: form_regPrestamo.php?");
}else if ($_POST['slc_periodo'] <= 0) {
    $_SESSION['message'] = 'Elija el periodo de pagos correcta';
    $_SESSION['message_type'] = 'danger';
    $_SESSION['rfc']; 
    header("Location: form_regPrestamo.php?"); 
}
}

?>

<?php include('includes/header3.php'); ?>

<?php 
    $tasa;

    if ($_POST['slc_periodo'] == 'Semanal') {
        $tasa= ($_POST['cant_prestamo'] * 0.18 * 7)/365;
    } else if ($_POST['slc_periodo'] == 'Quincenal') {
        $tasa= ($_POST['cant_prestamo'] * 0.23 * 15)/365;
    } else if ($_POST['slc_periodo'] == 'Mensual'){
        $tasa= ($_POST['cant_prestamo'] * 0.30 * 30)/365;
    }else{
        echo $_POST['slc_periodo'];
        echo $_POST['cant_prestamo'];
    }
?>
<div class="container p-4">
</div>
    <div class="container p-4">
        <form action="regPrestamo.php" method="POST">
            <div class="row">

            <div class="col-md-6">
            <div class="card border-primary card text-white bg-dark card-body">
       <!---<h5 class="card-title">Usuario <?php echo $_SESSION['rfc'] ?></h5>  --->
            <h5 class="card-title">Solicitud de prestamo</h5> <!-- Recuadro informacion personal -->
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">RFC</label>
                <div class="col-sm-6">
                    <input type="text" name="lblrfc" class="form-control" placeholder="RFC" autofocus value= "<?php echo $_SESSION['rfc'] ?>" readonly="readonly"> 
                </div> 
                </div>
            </div> 
            
            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Cantidad solicitada</label>
                <div class="col-sm-6">
                    <input type="number" name="cantPrest" class="form-control" autofocus readonly="readonly" value= "<?php echo $_POST['cant_prestamo']?>">
                </div>
                </div>
            </div> 

            <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-5 col-form-label">Periodo de pagos</label>
                <div class="col-sm-6">
                    <input type="text" name="slc_periodo" class="form-control" autofocus readonly="readonly" value="<?php echo $_POST['slc_periodo']?>"> 
                </div>
                </div>
            </div>

            </div> <!---card card-body--->
            </div><!---class row--->

            <div class="col-md-6">
            <div class="card border-primary card text-white bg-dark card-body">
       <!---<h5 class="card-title">Usuario <?php echo $_SESSION['rfc'] ?></h5>  --->
            <h5 class="card-title">información</h5> <!-- Recuadro informacion personal -->

            <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">Tasa de interes</label> <!---(0.7 semanal)(1.05 quincenal)(2.1 mensual)--->
            <div class="col-sm-6">
            <?php 
                if ($_POST['slc_periodo'] == 'Semanal') {?>
                    <input type="text" name="tasa_interes" class="form-control" value="18%" readonly="readonly"> 
           <?php } else if ($_POST['slc_periodo'] == 'Quincenal') {?>
                    <input type="text" name="tasa_interes" class="form-control" value="23%" readonly="readonly">
           <?php } else if ($_POST['slc_periodo'] == 'Mensual'){?>
                    <input type="text" name="tasa_interes" class="form-control" value="30%" readonly="readonly">
           <?php }else{
                    echo $_POST['slc_periodo'];
                    echo $_POST['cant_prestamo'];
                }
            ?>
            </div>
            </div>
        </div> 

        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">Cantidad a pagar </label>
            <div class="col-sm-6">
                <input type="number" name="cant_pagos" class="form-control" readonly="readonly" value=<?php echo round($tasa*100)/100?>>
            </div>
            </div>
        </div> 

        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">No. de tarjeta</label>
            <div class="col-sm-6">
                <input type="number" name="no_tarjeta" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx" autofocus min=0 max=9999999999999999 required>
            </div>
            </div>
        </div> 

        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">CVD</label>
            <div class="col-sm-6">
                <input type="number" name="CVD" class="form-control" placeholder="xxx" autofocus min=0 max=999 required> 
            </div>
            </div>
        </div> 

        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-5 col-form-label">Caducidad</label>
            <div class="col-sm-6">
                <input type="month" name="caducidad" class="form-control" placeholder="xx/xx" autofocus required>
            </div>
            </div>
        </div>

        <div class="container p-4">
            <input type="submit" name="confirmar" class="btn btn-success btn-block" value="Confirmar solicitud">
        </div>        
            
            </div> <!---card card-body--->

            </div><!---class row--->
        </form>
    </div><!--- class container--->            

<?php include('includes/footer.php'); ?>