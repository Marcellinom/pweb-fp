<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["id"])) {
  header("location: Home.php");
  exit;
}
 
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $password = md5($password);
        $sql = "SELECT id, username, password FROM user WHERE username = ? AND password = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $password);
            //string string
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        // Password is correct, so start a new session
                        session_start();
                            
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;                            
                        
                        // Redirect user to welcome page
                        header("location: Home.php");
                    }
                } 
                else{
                    // Display an error message if username doesn't exist
                    $username_err = "Password or Username is incorrect.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body { 
            font: 16px sans-serif;
            color: black;
        }


    </style>
</head>
<body background="background2.jpg" style="background-size: 2560px 1440px; background-position-x: center;">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="display: flex; justify-content: center;">
            <a class="navbar-brand" href="Home.php" style="">
            <img src="stunt_logo.png" alt="logo" width="48" height="48" style="margin-left: 10px;">
            <img src="stunt_text.png" alt="text-logo" width="120" height="36" style="">
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
        <div class="container d-flex justify-content-center">
        <div class="card bg-light" style="margin-top: 5vh; font-family: Verdana, sans-serif; width: 25rem; box-shadow: 0 6px 10px rgba(0,0,0,.5), 0 0 6px rgba(0,0,0,.05);">
            <div class="card-body">
                <div class="text-center">
                    <img src="stunt_logo_text.png" alt="stunt_logo" width="250px" height="250px">
                </div>
                <br>
                <h3 style="margin-bottom: 10px"><b>Login</b></h3>
                <form method="POST">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" style="border: 1px solid grey" placeholder="Enter your username">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" class="form-control" style="border: 1px solid grey" placeholder="Enter your password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group text-center" style="margin-bottom: 10px;">
                    <input type="submit" class="btn btn-primary" value="Continue">
                </div>
                <p class="text-center">Don't have an account? <a href="register.php">Sign up now</a>.</p>
                </form>
            </div>
            </div>
        </div>
</body>
</html>