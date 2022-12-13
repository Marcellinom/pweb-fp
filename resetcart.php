<?php
    include "connect.php";

    session_start();
    $iduser = $_SESSION["id"];

    $query = "UPDATE usercart SET status = 0 WHERE id_user = $iduser";

    $conn -> query($query);
?>