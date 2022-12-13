<head>
    <title>STUNT</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<?php
    require_once "connect.php";
    include 'cart.php';

    $id = $_GET['id'];
    
    $querry = "SELECT * FROM games WHERE id_game = $id";

    $result = mysqli_query($conn,$querry);

    $row = mysqli_fetch_assoc($result);

    $hasil = $row['nama'];
    $src = str_replace(' ','',$hasil);
    $src = str_replace('-','',$src);

    echo "<div class=container>";
    echo "<div class=row>";
    echo "<div class=col-lg-12 col-md-12 col-sm-12 border>";
        echo "<div class=card>";
            echo "<img src=$src.jpg class=card-img-top>";
            echo "<div class=card-body>";
                echo "<h5 class=card-title>$hasil</h5>";
            echo "</div>";
            echo "<ul class=list-group list-group-flush>";
                echo "<li class=list-group-item>{$row['genre']}</li>";
                echo "<li class=list-group-item>{$row['harga']}</li>";
                echo "<li class=list-group-item>{$row['developer']}</li>";
                echo "<li class=list-group-item>{$row['tanggal_release']}</li>";
                echo "<li class=list-group-item>{$row['deskripsi']}</li>";
        echo "</div>";
    echo "</div>";
    echo "<br>";
    echo "</div>";
    echo "</div>";
    echo "<center><button type=button class='btn btn-success' id='add'>Add To Cart</button><center>";
?>

<div id="btnplace">
<center><h5 id=place></h5></center>    
</div>

<script>
            $('#add').click(function()
            {
                $('#place').replaceWith('<center><h5>Added To Cart</h5></center>');
                $('#add').remove();
                $('#btnplace').append('<center><table><tr><td><a class="btn btn-warning" href="coba.php" role="button">Return To Home</a></td><td><a class="btn btn-primary" href="cart.php" role="button">Go To Cart</a></td></tr></table><center>');
            });
</script>



