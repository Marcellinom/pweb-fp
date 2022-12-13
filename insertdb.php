<?php

include "connect.php";

$nama = $_POST["nama"];
$genre = $_POST["genre"];
$deskripsi = $_POST["deskripsi"];
$developer = $_POST["developer"];
$tanggal_release = $_POST["tanggal_release"];
$harga = $_POST["harga"];

$ins = "INSERT INTO `games` (`id_game`, `nama`, `genre`, `deskripsi`, `developer`, `tanggal_release`, `harga`) VALUES (NULL, '$nama', '$genre', '$deskripsi', '$developer', '$tanggal_release', '$harga')";

$action = $conn->query($ins);

?>

