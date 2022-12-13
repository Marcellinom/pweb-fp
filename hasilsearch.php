<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <style type="text/css">
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        .carousel-inner {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.5), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.5), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.7), 0 4px 8px rgba(0,0,0,.5);
        }

        .card-img-top {
            object-fit: cover; 
            width: 100%; 
            height: 20vw;
        }

        .footer {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .dropdown-menu {
            width: 100%;
        }

        h1, h2, h3, h4, h5, h6, p {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .card h5{
            color: gold;
            text-shadow: 2px 2px 4px #000000;
            
        }

        #all, #rpg, #moba, #fps, #horror {
            margin-right: 7px;
        }

    </style>
</head>

<body background="" style="background-size: 2560px 1440px; background-position-x: center; font-family: Verdana, sans-serif; background-color: #141414;">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="">
            <a class="navbar-brand" href="Opening.html" style="">
                <img src="stunt_logo.png" alt="logo" width="48" height="48" style="margin-left: 5px;">
                <img src="stunt_text.png" alt="text-logo" width="120" height="36" style="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="#navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="text-align: center; color: white;">Hello,<?php session_start(); echo $_SESSION["username"];?><a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Home.php" style="text-align: center; color: white;">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="text-align: center; color: white;">Logout</a>
                    </li>

                </ul>
                <a href="cart.php" class="btn btn-outline-success my-2"><img src="cart.png" alt="cart" width="24" height="24"></a>
                <form class="form-inline justify-content-center" action="hasilsearch.php" method="post">
                    <input type="search" class="form-control mr-sm-2 ml-sm-2" placeholder="Search" aria-label="Search" name = "input">
                    <button class="btn btn-outline-info my-2" type="submit"> <img src="search3.png" alt="search" width="24" height="24"> </button> <!-- Button kalau dipencet langsung nampilin pakai ajax -->
                </form>
            </div>
        </nav>
<br>
<center><h1>Search Result</h1></center>
<br>

<div class="container">
<div class="row"> 
<?php
include "connect.php";

$input = $_POST['input'];

$query = "SELECT * FROM games WHERE nama LIKE '%$input%' OR developer LIKE '%$input%' or genre LIKE '%$input%'";

$result = $conn->query($query);

    if ($result->num_rows ==0) 
    {
       echo "<h5>Hasil Pencarian Tidak Ditemukan</h5>";
    }
    else
    {

        while($row = mysqli_fetch_assoc($result))
        {
            $hasil = $row['nama'];
                         $src = str_replace(' ','',$hasil);
                         $src = str_replace('-','',$src);
                         echo"
                         <div class='col-lg-6 col-md-6 col-sm-6 col-6'>
                             <div class='card bg-dark'>
                                 <a href=querypenampilgame.php?id={$row['id_game']}> <img class=card-img-top src=pictures/$src.jpg> <!-- href ke halaman query detail game -->
     
                                 <div class=card-body>
                                     <h5><b>{$row['nama']}</b></h5>
                                     <h6 style=color: grey>{$row['developer']}</h6>
                                     <h6>{$row['genre']}</h6> <!-- Query genre disini-->
     
                                     <h6 class=text-right>{$row['harga']}</h6> <!-- Query harga-->
                                 </div>
                                 </a>
                             </div>
                             <br>
                         </div>";
        }
    }
?>
</div>
</div>
</body>