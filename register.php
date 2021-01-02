<?php
require_once "config.php";

$username = "" ;
$email = "";
$phno = "";
$dob = "";
$password = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["name"] ;
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $dob = $_POST["dob"];
    $password = $_POST["passwd"]; 
    $result = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");

    if(mysqli_num_rows($result)){
        echo "<script>alert('User email already exists')
        window.location.href = 'login.php'          
        </script>";
        mysqli_close($conn);
    } else {
        $sql = "INSERT INTO users (name,email,dob,password,phno) VALUES ('$username','$email','$dob','$password','$phno')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Registration successful!')
            window.location.href = 'booking.php'
            </script>";
        } else {
            echo mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <form action="register.php" class="registration-form" method="POST"> 
                <div class="form-container">
                    <h3>Tell us who you are</h3>
                    <div class="form-input form-input-name">
                        <label for="name">Name</label> <br>
                        <input name="name" id="name" type="text" placeholder="Your name" required>
                    </div>
                    <div class="form-input form-input-email">
                        <label for="email">Email address</label> <br>
                        <input name="email" id="email" placeholder="Your email address"  type="email" required>
                    </div>
                    <div class="form-input form-input-dob">
                        <label for="dob">Date of Birth</label> <br>
                        <input name="dob" id="dob" type="date" required>
                    </div>
                    <div class="form-input form-input-phno">
                        <label for="phno">Phone number</label> <br>
                        <input name="phno" id="phno" type="text" placeholder="Your phone number" required> 
                    </div>
                    <div class="form-input form-input-passwd">
                        <label for="passwd" >Password</label> <br>
                        <input name="passwd" id="passwd" type="text" placeholder="Create a password" required> 
                    </div>
                    <div class="form-input form-input-confirm-password">
                        <label for="confirm_passwd">Confirm password</label> <br>
                        <input name="confirm_passwd" id="confirm_passwd" type="text" placeholder="Re-type password" required> 
                    </div>
                    <div class="form-input form-input-buttons">
                        <button class="btn btn-submit" type="submit">Submit</button>
                        <button class="btn btn-reset" type="reset">Reset</button> <br>
                    </div>
                    <p>Already have an account? <a href="index.php">Login here</a> </p>
                </div>
            </form>
        </div>
    </body>
</html>