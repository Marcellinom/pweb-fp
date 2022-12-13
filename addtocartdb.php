<?php
    include "connect.php";

    $iduser = $_POST['iduser'];
    $idgame = $_POST['idgame'];

    $sql = "INSERT INTO usercart (id_user,id_game,status) VALUES ($iduser, $idgame,1)";
                
    $conn -> query($sql);
?>