<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Pembayaran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            height: 100%;
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
            <style>
                #outer
                {
                    width:100%;
                    text-align: center;
                }
                .inner
                {
                    display: inline-block;
                }
            </style>
        <?php
                    require_once "connect.php";

                    $id = $_GET['id'];

                    $sql = "SELECT * FROM usercart uc JOIN games g WHERE g.id_game = uc.id_game
                    and uc.id_user = $id AND uc.STATUS = 2";
                    $result = $conn->query($sql);
                    $list = "<table style='style='width=650vw';'>";
                    $total = 0;
                    foreach ($result as $row) {
                        $harga = "Free";
                        if ($row['harga'] !== "Free") {
                            $total += (int)$row['harga']; 
                            $harga = "IDR ".number_format((int)$row['harga'], 0, ',', '.');
                        } 
                        $list .= "<tr>";
                        $list .= "<td><h5>" . $row['nama'] . "</h5></td>";
                        $list .= "<td><h5>" . $harga . "</h5></td>";
                        $list .= "</tr>";
                    }
                    $total = "IDR ".number_format($total, 0, ',', '.');
                    $list .= "<tr>";
                    $list .= "<td><h5>Total</h5></td>";
                    $list .= "<td><h5>" . $total . "</h5></td>";
                    $list .= "</tr>";
                    $list .= "</table>";

                    echo"
                    <div class=col-lg-12 col-md-12 col-sm-12 col-12>
                        <div class=card-dark>
                            <img class=card-img-top src='bukti_bayar/$id.jpg'>
                            <div id='outer'>
                                <div class='inner'>
                                    <button class='btn btn-danger' onclick='action(0, $id)'>Decline</button>
                                </div>
                                <div class='inner'>
                                    <button class='btn btn-success' onclick='action(1, $id)'>Approve</button>
                                </div>
                            </div>
    
                            <br>
                            <br>
    
                            <div style=color: white;>
                                <hr class=solid>
                                $list
                            </div>
    
                            <div class=card-dark>
                            <hr class=solid>
                            </div>
                        </div>
                 </div>";
                ?>
        </div>
    </div>
    <script>
        function action(approved, user_id) {
            $.ajax({
                url: "verifikasi_action.php",
                type: "POST",
                data: {
                    id: user_id,
                    approved: approved ? 0 : 1
                },
                success: function (data) {
                    window.location.href = "verifikasi.php";
                }
            });
        }
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>