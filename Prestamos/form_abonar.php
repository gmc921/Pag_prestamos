<?php include("conect.php"); ?>

<?php include('includes/header3.php'); ?>

<div class="container p-4">
<?php
    $id= $_GET['id'];
    $rfc= $_SESSION['rfc']; echo "Abonar al prestamo con id ",$id, " del usuario ", $rfc;
    
    $query = "SELECT cantidad_pagar FROM reg_prestamos WHERE id_prestamo= $id";
    $result_pags = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result_pags)) {
      $cant_pagar= $row['cantidad_pagar'];
    }

    $query = "SELECT total FROM reg_prestamos WHERE id_prestamo= $id";
    $result = mysqli_query($conn, $query); 

    $query2 = "SELECT cant_abonada, cant_deuda FROM reg_abonos WHERE id_prestamo= $id";
    $result2 = mysqli_query($conn, $query2); 

    if ($cantReg= mysqli_num_rows($result2) <= 0) {
      while($row = mysqli_fetch_assoc($result)){
        $total= $row['total'];
        $cant_deuda= $row['total'];
      }
    }else{
      while($row2 = mysqli_fetch_assoc($result2)) {
        $cant_deuda= $row2['cant_deuda'];
      }
      while($row = mysqli_fetch_assoc($result)) {
        $total= $row['total'];
      }
    }
?>
  <div class="container p-4">
    <div class="form group mx-auto">
      <img src="https://image.flaticon.com/icons/png/512/3135/3135715.png" width="100" >
    </div>  
  </div>
</div>

<main class="container">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php unset($_SESSION['message']); } ?>

      <!-- ADD TASK FORM -->
      <div class="card border-primary card text-white bg-dark card-body">
        <form action="reg_abono.php" method="POST">

        <?php
        if ($total == $cant_deuda or $cant_deuda > $cant_pagar and $cant_deuda > $cant_pagar*2){?>
          <div class="form-group">
            <select class="form-control" name="slc_cantidad">
                <option value=0>Cantidad que desea abonar</option>
                <option value=<?php echo $cant_pagar?>><?php echo "$",$cant_pagar?></option>
                <option value=<?php echo $cant_pagar*2?>><?php echo "$",$cant_pagar * 2?></option>
                <option value=<?php echo $cant_pagar*3?>><?php echo "$",$cant_pagar * 3?></option>
                <option value=<?php echo $cant_pagar*4?>><?php echo "$",$cant_pagar * 4?></option>
            </select>
          </div>  
        <?php }else{?>
          <div class="form-group">
            <select class="form-control" name="slc_cantidad">
                <option value=0>Cantidad que desea abonar</option>
                <option value=<?php echo $cant_deuda/2?>><?php echo "$",$cant_deuda/2?></option>
                <option value=<?php echo $cant_deuda?>><?php echo "liquidar $",$cant_deuda?></option>
            </select>
          </div>
        <?php }?>

          <input type="hidden" name="id_prest" class="btn btn-success btn-block" value=<?php echo $id?>>
          <input type="hidden" name="irfc" class="btn btn-success btn-block" value=<?php echo $rfc?>>
          <input type="hidden" name="deuda" value=<?php echo $cant_deuda?>>

          <div class="mb-3 row">
            <div class="col-sm-12"> 
              <input type="submit" name="abonar" class="btn btn-success btn-block" value="ABONAR">
            </div>
          </div>

        </form>

          <form action="form_historial_prestamos.php">
            <input type="submit" name="volver" class="btn btn-warning btn-block" value="VOLVER">
          </form>
          
      </div>

    </div>
    <div class="col-md-8">
      <table class="table table-bordered table-dark">
        <thead class="thead-light">
          <tr>
            <th>Total</th>
            <th>Cantidad abonada</th>
            <th>Cantidad deuda</th>
            <th>Fecha de abono</th>
            <th>Pagos faltantes</th>
          </tr>
        </thead>
        <tbody>

          <?php

            $query = "SELECT total FROM reg_prestamos WHERE id_prestamo= $id";
            $result = mysqli_query($conn, $query); 

            $query2 = "SELECT * FROM reg_abonos WHERE id_prestamo= $id";
            $result2 = mysqli_query($conn, $query2); 

          if ($cantReg= mysqli_num_rows($result2) > 0) {
          while($rowR2 = mysqli_fetch_assoc($result2)) { ?>
          <tr> 
            <td><?php echo "$",$total; ?></td>
            <td><?php echo "$",$rowR2['cant_abonada']; ?></td>
            <td><?php echo "$",$rowR2['cant_deuda']; ?></td>
            <td><?php echo $rowR2['fecha_abonada']; ?></td>
            <td><?php echo $rowR2['fecha_abonada']; ?></td>
          </tr>
          <?php }}else{
          while($row2 = mysqli_fetch_assoc($result)) {?>
          <tr> 
            <td><?php echo "$ ",$row2['total']; ?></td>
            <td><?php echo "Sin abonar"; ?></td>
            <td><?php echo "Sin abonar"; ?></td>
            <td><?php echo "Sin abonar"; ?></td>
            <td><?php echo "Sin abonar"; ?></td>
          </tr>
          <?php }} ?>  
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
