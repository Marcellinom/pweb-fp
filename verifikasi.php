<?php
session_start();
include "is_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pembayaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    
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

<body body background="" style="background-size: 2560px 1440px; background-position-x: center; font-family: Verdana, sans-serif; background-color: #141414;">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="display: flex; justify-content: center;">
        <a class="navbar-brand" href="admin.php" style="">
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
                <a class="nav-link" href="logout.php" style="text-align: center; color: white;">Logout</a>
                <a class="nav-link" href="verifikasi.php" style="text-align: center; color: white;">Verifikasi</a>

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
    <?php
        $files = scandir("bukti_bayar");
        include "connect.php";
        foreach ($files as $file) {
            if ($file == "." || $file == "..") continue;
            $id = explode(".", $file)[0];
            // fetch user data using id
            $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
            $row = mysqli_fetch_array($result);
            $result2 = mysqli_query($conn, "SELECT SUM(g.harga) as total FROM games g JOIN usercart uc WHERE uc.id_game = g.id_game
            AND uc.id_user = $id AND uc.status = 2");
            $row2 = mysqli_fetch_array($result2);
            // get total price
            $total = $row2['total'];
            // get name
            $name = $row['username'];
            echo " <div class='col-lg-4 col-md-6 col-sm-6 col-6' id=$id>
            <a href='verifikasi_detail.php?id=$id'>
                <div class='card card-1 bg-dark justify-content-center'>        
                <img src=bukti_bayar/$file class='card-img-top'>
                        <div class='card-body text-white'>     
                                <h5><b>$name</b></h5>
                        </div>

                        <div class='footer text-right text-white' style='margin-right: 10px; margin-bottom: 10px;'>
                        <h6>IDR $total</h6>
                    </div>
                </div>
                <br>
                </a>
            ";   
        }
    ?>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#submita").click(function() {

            var nama = $("#gamename").val();
            var genre = $("#gamegenre").val();
            var deskripsi = $("#gamedesc").val();
            var developer = $("#gamedev").val();
            var tanggal_release = $("#releasedate").val();
            var harga = $("#price").val();


            $.ajax({
                type: "POST",
                url: "insertdb.php",
                data: {
                    nama: nama,
                    genre: genre,
                    deskripsi: deskripsi,
                    developer: developer,
                    tanggal_release: tanggal_release,
                    harga: harga
                }
            }).done(function(res) {}).fail(function(e) {});

        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>