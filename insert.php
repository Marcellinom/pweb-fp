<?php
session_start();
include "is_admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert / Edit</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        a.editbtn {
            color: black;
        }

        a.deletebtn {
            color: black;
        }

        a.editbtn:hover {
            color: blue;
        }

        a.deletebtn:hover {
            color: red;
        }

        img.logo:hover {
            animation: shake 0.5s;
            animation-iteration-count: infinite;
        }

        label {
            color: white;
        }

        ::placeholder {
            color: white;
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

                <li class="nav-item">
                    <a class="nav-link" href="#" style="text-align: center;">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
        <form>
            <div class="row">
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Game name</label>
                    <input type="text" name="gamename" id="gamename" class="form-control text-white bg-dark" style="border: 1px solid grey" placeholder="Enter game name">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Game genre</label>
                    <input type="text" name="gamegenre" id="gamegenre" class="form-control text-white bg-dark" style="border: 1px solid grey" placeholder="Enter game genre">
                </div>
                <div class="form-group col-md-12" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Game description</label>
                    <textarea name="gamedesc" id="gamedesc" class="form-control text-white bg-dark" rows="3" style="border: 1px solid grey" placeholder="Enter game description"></textarea>
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Game developer</label>
                    <input type="text" name="gamedev" id="gamedev" class="form-control text-white bg-dark " style="border: 1px solid grey" placeholder="Enter game developer name">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Release date</label>
                    <input type="text" name="releasedate" id="releasedate" class="form-control text-white bg-dark" style="border: 1px solid grey" placeholder="Enter game release date">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Game price</label>
                    <input type="text" name="price" id="price" class="form-control text-white bg-dark" style="border: 1px solid grey" placeholder="Enter game developer name">
                </div>
                <div class="form-group col-md-6" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Image file</label>
                    <input type="text" name="imagefile" id="imagefile" class="form-control text-white bg-dark" style="border: 1px solid grey" placeholder="Enter game developer name">
                </div>
                <br>
                <div class="d-grid gap-2 mx-auto">
                    <a href="admin.php" id="submita"><button type="button" class="btn btn-primary" value="Continue" id="submit" role="button" aria-pressed="true" onclick="Addtodb()">Submit</button>
                    </a>
                </div>
            </div>
        </form>
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