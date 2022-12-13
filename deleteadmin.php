<?php
    include "connect.php";

    session_start();
    $iduser = $_SESSION["id"];

    $idgame = $_POST['idgame'];

    $query = "DELETE FROM games WHERE id_game = $idgame";

    $conn -> query($query);
?>