<?php
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = md5($password); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 16px sans-serif;
            color: black;
        }
        .wrapper{
        }
    </style>
</head>
<body background="background1.jpg" style="background-size: 2560px 1440px; background-position-x: center;">
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
            <h3 style="margin-bottom: 10px;"><b>Sign Up</b></h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" style="border: 1px solid grey" placeholder="Enter your username">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" style="border: 1px solid grey" placeholder="Enter your password">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" style="margin-bottom: 15px;">
                    <label style="margin-bottom: 5px;">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" style="border: 1px solid grey" placeholder="Confirm your password">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group text-center" style="margin-bottom: 10px;">
                    <input type="submit" class="btn btn-primary" value="Continue">
                </div>
                <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
        </div>
        
</body>
</html>