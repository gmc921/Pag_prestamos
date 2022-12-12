<?php
include('conect.php');

if (isset($_POST['abonar'])){

    $clavePrestamo= $_POST['id_prest'];
    $cant_abonada= $_POST['slc_cantidad'];
    $cant_deuda= $_POST['deuda'] - $_POST['slc_cantidad'];
    $rfc= $_POST['irfc'];


    if ($cant_abonada > 0) {
        $query = "INSERT INTO reg_abonos(id_prestamo, RFC, cant_abonada, cant_deuda) VALUES ('$clavePrestamo', '$rfc', '$cant_abonada', '$cant_deuda')";
        $result = mysqli_query($conn, $query);

        if(!$result) {
            die("Query Failed.");
        }
    
        $_SESSION['message'] = "Abono de $cant_abonada registrado con exito";
        $_SESSION['message_type'] = 'success';
        $_SESSION['rfc'];
        header("Location: form_abonar.php?id=$clavePrestamo"); 
    }else{
        $_SESSION['message'] = 'Elija la cantidad correcta';
        $_SESSION['message_type'] = 'danger';
        $_SESSION['rfc']; 
        header("Location: form_abonar.php?id=$clavePrestamo");
    }
    
}

?>