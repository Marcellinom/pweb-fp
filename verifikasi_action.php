<?php
    include "connect.php";
    $user_id = $_POST['id'];
    $approved = $_POST['approved'];
    $query = "UPDATE usercart SET status = $approved WHERE id_user = $user_id";
    $result = mysqli_query($conn,$query);
    unlink("bukti_bayar/$user_id.jpg");
?>