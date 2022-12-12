<?php
include('conect.php');

if (isset($_POST['confirmar'])){

    $clave= $_POST['lblrfc'];
    $cantidad= $_POST['cantPrest'];
    $periodo= $_POST['slc_periodo'];
    $tasaInteres= $_POST['tasa_interes'];
    $cantidadPagos= $_POST['cant_pagos'];
    $tarjeta= $_POST['no_tarjeta'];
    $CVD= $_POST['CVD'];
    $caducidad= $_POST['caducidad'];

    
    $query2 = "SELECT * FROM info_bancaria WHERE rfc = '$clave'";
    $result2 = mysqli_query($conn, $query2);
    $row= mysqli_num_rows($result2);

    if ($row > 0) {
        while($row= mysqli_fetch_assoc($result2)){
            if ($row['no_tarjeta'] != $tarjeta and $row['cvd'] != $CVD and $row['caducidad'] != $caducidad) {
                $query = "INSERT INTO reg_prestamos(RFC, total, tipo_pago, tasa_interes, cantidad_pagar) VALUES ('$clave', '$cantidad', '$periodo', '$tasaInteres', '$cantidadPagos')";
                $result = mysqli_query($conn, $query);
    
                $query = "INSERT INTO info_bancaria VALUES ('$clave', '$tarjeta', '$CVD', '$caducidad')";
                $result = mysqli_query($conn, $query);
    
                if(!$result) {
                    die("Query Failed.");
                }
            }else{
                $query = "INSERT INTO reg_prestamos(RFC, total, tipo_pago, tasa_interes, cantidad_pagar) VALUES ('$clave', '$cantidad', '$periodo', '$tasaInteres', '$cantidadPagos')";
                $result = mysqli_query($conn, $query);
    
                if(!$result) {
                    die("Query Failed.");
                }
            }
        }
    }else{
        $query = "INSERT INTO reg_prestamos(RFC, total, tipo_pago, tasa_interes, cantidad_pagar) VALUES ('$clave', '$cantidad', '$periodo', '$tasaInteres', '$cantidadPagos')";
        $result = mysqli_query($conn, $query);
    
        $query = "INSERT INTO info_bancaria VALUES ('$clave', '$tarjeta', '$CVD', '$caducidad')";
        $result = mysqli_query($conn, $query);
    
        if(!$result) {
            die("Query Failed.");
        }
    }

    

    
    $_SESSION['rfc']= $_POST['lblrfc'];
    header("Location: form_usuario_menu.php"); 

}

?>