<?php

include('conect.php');

if (isset($_POST['guardar'])) {

  $f_nacimiento = $_POST['f_nacimiento'];

  echo $rfc="23sd";
  #echo " -- ",$f_nacimiento;
  $año= date("Y");
  echo " -- ",$edad = date("Y",strtotime($f_nacimiento)), " f_hoy -> ", $año;
  echo " -- ",$edad = $año - date("Y",strtotime($f_nacimiento));

  if ($edad >= 18) {
      echo " --- Tiene 18+, su edad es ->", $edad;
  }else{
      echo " --- No tiene 18+, su edad es ->", $edad;
  }

  #$query = "INSERT INTO clientes(RFC, contrasena, Nombre, ap_Paterno, ap_Materno, fecha_nacimiento, telefono) 
  #          VALUES ('$rfc','$pass', '$nom', '$ap_pat', '$ap_mat', '$f_nacimiento', '$tel')";
  #$result = mysqli_query($conn, $query);

  #if(!$result) {
  #  die("Query Failed.");
  #}



}

?>
