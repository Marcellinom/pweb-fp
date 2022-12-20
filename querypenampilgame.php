<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Games</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    
    <style type="text/css">
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0,0,0,.5), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        }

        .footer {
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .dropdown-menu {
            width: 100%;
        }

        hr.solid {
            border-top: 2px solid #FFFFFF;
        }

        h1, h2, h3, h4, h5, h6, p {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

    </style>
</head>
<body background="" style="background-size:; background-position-x: center; font-family: Verdana, sans-serif; background-color: #141414;">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="">
            <a class="navbar-brand" href="Home.php" style="">
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
                <form class="form-inline justify-content-center">
                    <a class="btn btn-outline-success my-2" href="cart.php"> <img src="cart.png" alt="cart" width="24" height="24"></a>
                    <input type="search" class="form-control mr-sm-2 ml-sm-2" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2" type="submit"> <img src="search3.png" alt="search" width="24" height="24"></button> <!-- Button kalau dipencet langsung nampilin pakai ajax -->
                </form>
            </div>
        </nav>
        <div class="container" style="padding-top: 5%;">
            <div class="row">
                <!-- php -->
                <?php
                    require_once "connect.php";
                
                    $id = $_GET['id'];
                    
                    $querry = "SELECT * FROM games WHERE id_game = $id";
                
                    $result = mysqli_query($conn,$querry);

                    $row = mysqli_fetch_assoc($result);

                    $hasil = $row['nama'];
                    $src = str_replace(' ','',$hasil);
                    $src = str_replace('-','',$src);

                    $userId = $_SESSION["id"];

                    $querry = "SELECT * FROM usercart WHERE id_user = $userId AND status = 1";
                                
                    $result = mysqli_query($conn,$querry);
                
                    $purchasedGame = array();
                    while($row_game = mysqli_fetch_assoc($result))
                    {
                        array_push($purchasedGame,$row_game['id_game']);
                    }

                    $jenis_button = in_array($id,$purchasedGame) 
                        ? "<button class='btn btn-success btn-block'>Added To Cart</button>" 
                        : "<button type=button class='btn btn-outline-primary btn-block' onclick='AddToCart($userId,$id)' id='cartbutton'>
                            <img src=cart.png width=16 height=16> Add To Cart
                            </button>";

                    echo"<h1 style=color: white; margin-bottom: 3%;>{$row['nama']}</h1>
                    <div class=col-lg-12 col-md-12 col-sm-12 col-12>
                        <div class=card-dark>
                            <img class=card-img-top src='pictures/$src.jpg'>
                            <div class=mt-3 style='color: white;' id='buttonplace'>
                                $jenis_button
                            </div>
                            <h5 class=mt-3 style='float: left;'>{$row['harga']}</h5>
    
                            <br>
                            <br>
    
                            <div style=color: white;>
                                <hr class=solid>
                                <h6>{$row['deskripsi']}</h6>
                            </div>
    
                            <div class=card-dark>
                            <hr class=solid>
                                <div style=color: white;>
                                    <p>Developer: {$row['developer']}</p>
                                    <p>Release Date: {$row['tanggal_release']} </p>
                                    <p>Genre: {$row['genre']}</p>
                                </div>
                            </div>
                        </div>
                 </div>";
                ?>
                        
            </div>
        </div>


    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                function AddToCart(iduser,idgame) 
                {
                        $.ajax({
                            method: "POST",
                            url: "addtocartdb.php",
                            data: {
                                iduser : iduser,idgame : idgame
                            },
                            success: function(response)
                            {
                                
                            },
                            error: function(e)
                            {

                            }
                        });

                    $("#cartbutton").remove();
                    $("#buttonplace").append("<button class='btn btn-success btn-block'>Added To Cart</button>");
                }
            </script>
</body>
</html>