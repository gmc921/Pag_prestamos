<?php include("conect.php"); ?>

<?php include('includes/header3.php'); ?>


<div class="container p-4">
<?php 
    $rfc= $_SESSION['rfc'];
    echo "TABLA DE ABONOS DE PRESTAMOS RFC: ",$rfc;
?>
  <div class="container p-4">
    <div class="form group mx-auto">
      <img src="https://image.flaticon.com/icons/png/512/3135/3135715.png" width="100" >
    </div>  
  </div>  
</div>

<main class="container">
  <div class="row">

      <table class="table table-bordered table-dark">
        <thead class="thead-light">
          <tr>
            <th>Folio prestamo</th>
            <th>Folio abono</th>  
            <th>Cantidad abonada</th>
            <th>Cantidad deuda</th>
            <th>Fecha de abono</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM reg_abonos WHERE RFC= '$rfc'";
          $result = mysqli_query($conn, $query);    

          if ($cantReg= mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo "# ",$row['id_prestamo']; ?></td>
            <td><?php echo "# ",$row['id_abono']; ?></td>  
            <td><?php echo "$",$row['cant_abonada']; ?></td>
            <td><?php echo "$",$row['cant_deuda']; ?></td>
            <td><?php echo $row['fecha_abonada']; ?></td>
          </tr>
          <?php }}else{?>
            <tr>
              <td><?php echo "Sin abonar"; ?></td>  
              <td><?php echo "Sin abonar"; ?></td>
              <td><?php echo "Sin abonar"; ?></td>
              <td><?php echo "Sin abonar"; ?></td>
              <td><?php echo "Sin abonar"; ?></td>
            </tr>
          <?php }?>
        </tbody>
      </table>

  </div>
</main>

<?php include('includes/footer.php'); ?>