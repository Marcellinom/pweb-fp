<?php
    include "connect.php";

    session_start();
    $userID = $_SESSION["id"];

    $query = "SELECT * FROM usercart WHERE id_user = $userID and status = 0";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($result);

    echo $row[0];

?>