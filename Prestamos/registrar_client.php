<?php

include('conect.php');

if (isset($_POST['guardar'])) {
  $rfc = $_POST['rfc'];
  $nom = $_POST['nombre'];
  $pass= $_POST['lblContra'];
  $ap_pat = $_POST['ap_paterno'];
  $ap_mat = $_POST['ap_materno'];
  $tel = $_POST['tel_personal'];
  $f_nacimiento = $_POST['f_nacimiento'];

  $pais = $_POST['pais'];
  $estado = $_POST['estado'];
  $municipio = $_POST['municipio'];
  $cp = $_POST['cod_postal'];
  $calle = $_POST['calle'];
  $colonia = $_POST['colonia'];
  $n_int = $_POST['num_interior'];
  $n_ext = $_POST['num_exterior'];

  $nom_empr = $_POST['nom_empresa'];
  $tel_empr = $_POST['tel_empresa'];
  $cp_empr = $_POST['cp_emp'];
  $puesto = $_POST['puesto'];
  $salario = $_POST['salario_mens'];

  $nom_ref1 = $_POST['nomb_ref1'];
  $ap_pat1 = $_POST['ap_pat1'];
  $ap_mat1 = $_POST['ap_mat1'];
  $tel_ref1 = $_POST['tel_ref1'];
  $nom_ref2 = $_POST['nomb_ref2'];
  $ap_pat2 = $_POST['ap_pat2'];
  $ap_mat2 = $_POST['ap_mat2'];
  $tel_ref2 = $_POST['tel_ref2'];

  $año= date("Y");
  $edad = $año - date("Y",strtotime($f_nacimiento));
  if ($edad >= 18) {

    $query = "INSERT INTO clientes(RFC, contrasena, Nombre, ap_Paterno, ap_Materno, fecha_nacimiento, telefono) 
            VALUES ('$rfc','$pass', '$nom', '$ap_pat', '$ap_mat', '$f_nacimiento', '$tel')";
    $result = mysqli_query($conn, $query);

    $query = "INSERT INTO domicilio(RFC, pais, estado, municipio, codigo_postal, calle, colonia, no_interior, no_exterior) 
            VALUES ('$rfc', '$pais', '$estado', '$municipio', '$cp', '$calle', '$colonia', '$n_int', '$n_ext')";
    $result = mysqli_query($conn, $query);

    $query = "INSERT INTO trabajo(RFC, nombre_empresa, telefono, codigo_postal, puesto, salario) 
            VALUES ('$rfc', '$nom_empr', '$tel_empr', '$cp_empr', '$puesto', '$salario')";
    $result = mysqli_query($conn, $query);

    $query = "INSERT INTO referencias VALUES ('$rfc', '$nom_ref1', '$ap_mat1', '$ap_pat1', '$tel_ref1', '$nom_ref2', '$ap_mat2', '$ap_pat2', '$tel_ref2')";
    $result = mysqli_query($conn, $query);

    if(!$result) {
      die("Query Failed.");
    }

    $_SESSION['rfc']= $_POST['rfc'];
    header("Location: form_usuario_menu.php"); 
  }else{
    $_SESSION['message'] = 'No cumple con la edad necesaria';
    $_SESSION['message_type'] = 'warning';
    header("Location: form_registro.php"); 
  }

}

?>
