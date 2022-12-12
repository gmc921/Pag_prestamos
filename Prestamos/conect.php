<?php 

    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'prestamos'

    ) 

    or die(mysqli_error($mysqli));

?>