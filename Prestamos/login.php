<?php
include('conect.php');

if (isset($_POST['iniciar_sesion'])){

    $clave= $_POST['lblRFC'];
    $contrasena= $_POST['lblContra'];

    $query = "SELECT RFC, contrasena FROM clientes WHERE RFC='$clave' AND contrasena='$contrasena'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['rfc']= $_POST['lblRFC'];
        header("Location: form_usuario_menu.php"); 
    }else{
        //die ("Datos invalidos");
        $_SESSION['message'] = 'Usuario o contraseña incorrecta';
        $_SESSION['message_type'] = 'warning';
        header("Location: form_login.php"); 
    }
    
    

}

?>