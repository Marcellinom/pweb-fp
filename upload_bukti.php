<?php
include "connect.php";
session_start();

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    if (!move_uploaded_file($_FILES['file']['tmp_name'], "bukti_bayar/".$_SESSION['id'].'.jpg'))
        echo 'Could not move file';
    $query = "UPDATE usercart SET status = 2 WHERE id_user = ".$_SESSION['id']." AND status = 1";
    mysqli_query($conn,$query);
?>