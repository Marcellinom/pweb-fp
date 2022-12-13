<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedinadmin"]) && $_SESSION["loggedinadmin"] === true) {
    header("location: admin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Game List</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .5), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .7), 0 4px 8px rgba(0, 0, 0, .5);
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

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .card h5 {
            color: gold;
            text-shadow: 2px 2px 4px #000000;

        }

        a.addbtn {
            float: right;
        }

        a.editbtn {
            color: white;
        }

        a.deletebtn {
            color: white;
        }

        a.editbtn:hover {
            color: yellowgreen;
        }

        a.deletebtn:hover {
            color: red;
        }

        img.logo:hover {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
        }

        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            10% {
                transform: translate(-1px, -2px) rotate(-1deg);
            }

            20% {
                transform: translate(-3px, 0px) rotate(1deg);
            }

            30% {
                transform: translate(3px, 2px) rotate(0deg);
            }

            40% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            50% {
                transform: translate(-1px, 2px) rotate(-1deg);
            }

            60% {
                transform: translate(-3px, 1px) rotate(0deg);
            }

            70% {
                transform: translate(3px, 1px) rotate(-1deg);
            }

            80% {
                transform: translate(-1px, -1px) rotate(1deg);
            }

            90% {
                transform: translate(1px, 2px) rotate(0deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }
    </style>
</head>

<body background="" style="background-size: 2560px 1440px; background-position-x: center; font-family: Verdana, sans-serif; background-color: #141414;">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="display: flex; justify-content: center;">
        <a class="navbar-brand" href="Opening.html" style="">
            <img src="stunt_logo.png" alt="logo" width="48" height="48" style="margin-left: 10px;" class="logo">
            <img src="stunt_text.png" alt="text-logo" width="120" height="36" style="" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="#navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarDropdown">
            <ul class="navbar-nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="text-align: center;">
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" style="text-align: center;">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">

        <div class="row">
            <div class="col text-white">
                <h2>Game List</h2>
            </div>

            <div class="col">
                <a href="insert.php" class="addbtn"><button class="btn btn-success ml-auto p-2">Add Game</button></a>
            </div>


        </div>
        <br>

        <div class="row">
            <?php
            include_once "connect.php";
            
            $querry = "SELECT * FROM games";

            $result = $conn->query($querry);
            if ($result->num_rows == 0) {
                echo "<h5>Keranjang Kosong</h5>";
            } else {
                while ($gameRow = mysqli_fetch_assoc($result)) {
                    include "connect.php";

                    $cardID = $gameRow['id_game'];

                    $getGameId = $gameRow['id_game'];

                    $querry2 = "SELECT * FROM games WHERE id_game = $getGameId";

                    $getGame = mysqli_query($conn, $querry2);

                    $rowGame = mysqli_fetch_assoc($getGame);

                    $hasil = $rowGame['nama'];
                    $src = str_replace(' ', '', $hasil);
                    $src = str_replace('-', '', $src);

                    $gameID = $rowGame['id_game'];

                    echo " <div class='col-lg-4 col-md-6 col-sm-6 col-6' id='$cardID'>
                <div class='card card-1 bg-dark justify-content-center'>
                        <img src=pictures/$src.jpg class='card-img-top'>
                        <div class='card-body text-white'>
                            
                                <h5><b>{$rowGame['nama']}</b></h5>
                                <h6>{$rowGame['developer']}</h6>
                                <h6>{$rowGame['genre']}</h6>
                            
                        </div>

                        <div class='footer text-right text-white' style='margin-right: 10px; margin-bottom: 10px;'>
                        <h6>{$rowGame['harga']}</h6>
                    </div>
                    <div class='footer text-right' style='margin-right: 20px; margin-bottom: 10px;'>
                        
                        <span>
                            <a href='#' style='padding-left: 30px;font-size:24px;' class='deletebtn' onclick='deletegame($gameID, $cardID)'><i class='fas fa-trash'></i></a>
                        </span>
                    </div>
                </div>
                <br>
                </div>";
                }
            }
            ?>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        function deletegame(idgame, idcard) {
            $.ajax({
                method: "POST",
                url: "deleteadmin.php",
                data: {
                    idgame: idgame
                },
                success: function(response) {
                    $("#" + idcard).remove();
                },
                error: function(e) {

                }
            });
            
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>