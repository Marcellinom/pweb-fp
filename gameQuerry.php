<?php
include "connect.php";

$genre = $_POST['genre'];

$querry = "";

if ($genre == "All")
{
    $querry = "SELECT * FROM games";
}
else
{
    $querry = "SELECT * FROM games WHERE genre = '$genre' ";
}

$result = mysqli_query($conn,$querry);

while($row = mysqli_fetch_assoc($result))
{
    $hasil = $row['nama'];
    $src = str_replace(' ','',$hasil);
    $src = str_replace('-','',$src);

    echo"
    <div class=col-lg-6 col-md-6 col-sm-6 col-6>
        <div class='card bg-dark'>
            <a href=querypenampilgame.php?id={$row['id_game']}> <img class=card-img-top src='pictures/$src.jpg'>
            <div class=card-body>
                <h5><b>{$row['nama']}</b></h5>
                <h6 style=color: grey>{$row['developer']}</h6>
                <h6>{$row['genre']}</h6> 
                <h6 class=text-right>{$row['harga']}</h6> 
            </div>
            </a>
        </div>
        <br>
    </div>
    ";
}
?>
