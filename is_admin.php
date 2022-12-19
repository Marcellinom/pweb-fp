<?php
include "connect.php";
$query = "SELECT type FROM user where id = ".$_SESSION['id'];
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if ($row['type'] != "admin")
{
    header("Location: Home.php");
}
?>