<?php
    include "connect.php";

    session_start();
    $iduser = $_SESSION["id"];

    $idgame = $_POST['idgame'];

    $query = "DELETE FROM usercart WHERE id_user = $iduser and id_game = $idgame";

    $conn -> query($query);
?>