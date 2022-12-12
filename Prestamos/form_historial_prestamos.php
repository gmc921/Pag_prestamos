<?php include("conect.php"); ?>

<?php include('includes/header3.php'); ?>


<div class="container p-4">
<?php 
    $rfc= $_SESSION['rfc'];
    echo "TABLA DE REGISTROS DE PRESTMAOS RFC: ",$rfc;
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
            <th>Prestamo total</th>
            <th>Periodo de pagos</th>
            <th>Tasa de interes</th>
            <th>Pagos</th>
            <th>Fecha de prestamo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM reg_prestamos WHERE RFC='$rfc'"; 
          $result = mysqli_query($conn, $query);    

          if ($f_num= mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo "$",$row['total']; ?></td>
                <td><?php echo $row['tipo_pago']; ?></td>
                <td><?php echo $row['tasa_interes']; ?></td>
                <td><?php echo "$",$row['cantidad_pagar']; ?></td>
                <td><?php echo $row['fecha_prestamo']; ?></td>
                <td>
                  <a href="form_abonar.php?id=<?php echo $row['id_prestamo']?>" class="btn btn-danger">
                    <i class="fas fa-cash-register"></i>
                  </a>
                </td>
              </tr>
            <?php }}else{ ?>
                <tr>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                  <td><?php echo "Sin prestamos registrados"; ?></td>
                </tr>
            <?php } ?>
        </tbody>
      </table>

  </div>
</main>

<?php include('includes/footer.php'); ?>