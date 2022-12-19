<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        h1, h2, h3, h4, h5, h6, p,td {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .card-img-top {
            object-fit: cover; 
            width: 100%; 
            height:10vw;
        }

        .card {
        text-align: center;
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

    </style>
</head>

<body background="" style="background-size: 2560px 1440px; background-position-x: center; font-family: Verdana, sans-serif; background-color: #141414;">
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
            </div>
        </nav>

<div class = "container" >
    <br><center><h1>Shopping Cart</h1></center><br>

<?php
    include "connect.php";
    $iduser = $_SESSION["id"];

    $querry = "SELECT * FROM usercart WHERE status = 1 AND id_user = $iduser";
                
    $result = $conn->query($querry);

    $totalBayar = 0;

    if ($result->num_rows ==0) 
    {
       echo "<center><h5>Cart Is Empty!</h5></center>";
    }
    else
    {
            echo "<div class=row>";
            while($cartRow = mysqli_fetch_assoc($result))
            {
                $cardID = $cartRow['id'];

                $getGameId = $cartRow['id_game'];

                $querry2 = "SELECT * FROM games WHERE id_game = $getGameId";

                $getGame = mysqli_query($conn,$querry2);

                $rowGame = mysqli_fetch_assoc($getGame);
                
                $hasil = $rowGame['nama'];
                $src = str_replace(' ','',$hasil);
                $src = str_replace('-','',$src);

                $gameID = $rowGame['id_game'];
                $harga = $rowGame['harga'];

                if ($rowGame['harga'] == "Free")
                {
                    $harga = "0";
                    $harga = (int)$harga;
                    $totalBayar = $totalBayar + 0;
                }
                else
                {
                    $harga = substr($harga,4);
                    $harga = str_replace('.',"",$harga);
                    $harga = (int)$harga;
                    $totalBayar = $totalBayar + $harga;
                }

                echo " <div class='col-lg-4 col-md-6 col-sm-6 col-6'>
                <div class='card card-1 bg-dark justify-content-center' id='$cardID'>
                        <img src=pictures/$src.jpg class='card-img-top'>
                        <div class='card-body'>
                            <b>
                                <h3>{$rowGame['nama']}</h3>
                                <h4>{$rowGame['harga']}</h4>
                            </b>
                        </div>

                        <div class='card-footer'>
                            <button type=button class='btn btn-danger' onclick='del($gameID,$cardID,$harga)'id='cartbutton'>Delete</button>
                        </div>
                </div>
                <br>
                </div>";
            }
            echo "</div>";
    }
    echo 
    "<div class='container d-flex justify-content-center'>
    <div class='row'>
        <div class='card bg-dark' style='width: 30vh;'>
            <div class='card-header'>
                <i class='fas fa-money-check-alt' style='font-size: 48px; color: greenyellow'></i>
            </div>

            <div class='card-body'>
                <h4 id='bayartext'>IDR $totalBayar</h4>
            </div>

            <div class='card-footer'>
                <button type='button' class='btn btn-info btn-block' onclick='update()' data-toggle='modal' data-target='#myModal'>Purchase</button>
            </div>
        </div>
    </div>
    </div>";

    echo "<div class='modal' id='myModal'>
    <div class='modal-dialog'>
        <div class='modal-content bg-dark'>

            <div class=modal-header>
                <h2>Success</h2>
                <button type=button class='close' data-dismiss='modal'>&times;</button>
            </div>

            <div class='modal-body'>
                <h5>Purchase has been made successfully! Thank you.</h5>
            </div>

            <div class='modal-footer'>
            <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
            </div>
        </div>
    </div>
</div>";

echo "<br>";
echo "<center><a class='btn btn-primary' href='Home.php' data-dismiss='modal'>Return To Home</a></center>";
?>;

<!-- AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
                function del(idgame,idcard,harga) 
                {
                        $.ajax({
                            method: "POST",
                            url: "deleteatcart.php",
                            data: {
                                idgame : idgame
                            },
                            success: function(response)
                            {
                                $("#"+ idcard).remove();
                                
                                var text = document.getElementById("bayartext").innerHTML;
                                var num = text.substring(4);
                                var result = parseInt(harga) - parseInt(num);
                                document.getElementById("bayartext").innerHTML = "IDR " + result;
                            },
                            error: function(e)
                            {
                                
                            }
                        });
                }

                function update()
                {
                    $.ajax({
                            method: "POST",
                            url: "resetcart.php",
                            success: function(response)
                            {
                                
                            },
                            error: function(e)
                            {
                                
                            }
                        });
                }
</script>
</div>
</body>