<?php
include "connect.php";
if (!isset($_SESSION['id'])) header("Location: Home.php");
$query = "SELECT type FROM user where id = ".$_SESSION['id'];
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if ($row['type'] != "admin")
{
    header("Location: Home.php");
}
?>