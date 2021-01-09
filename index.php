<style>
        body  
        {  
            margin: 0;  
            padding: 0; 
            font-family: 'Arial';  
            background-image: url('images/login.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            margin-top: 15%;
        } 
       
</style>

<?php
require_once "config.php";

$email = "";
$password = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["passwd"]; 

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' and password='$password'");

    if(mysqli_num_rows($result)){
        echo "Welcome to booking page";
        header("location: booking.php");
    } else {
        echo '<script>alert("Invalid credentials")</script>';
    }
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" class="login-form" method="POST">
            <div class="form-container"> 
                <h3>Welcome</h3>
                <div class="form-input form-input-email"> 
                    <label for="email">Email address</label> <br>
                    <input id="email" name="email" placeholder="Your email address"  type="email" required>
                </div>
                <div class="form-input form-input-passwd">
                    <label for="passwd" >Password</label> <br>
                    <input id="passwd" name="passwd" type="text" placeholder="Create a password" required> 
                </div>
                <div class="form-input form-input-buttons">
                    <button class="btn btn-submit" type="submit">Submit</button> 
                    <button class="btn btn-reset" type="reset">reset</button> 
                </div>
                <p>Don't have an account? <a href="register.php">Register here</a> </p>
            </div>
        </form>
    </div>
</body>
</html>