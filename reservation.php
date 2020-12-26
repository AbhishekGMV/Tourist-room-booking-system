<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
                function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/custom-styles.css" rel="stylesheet" />
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <!--//fonts-->
        <title>Reservation page</title>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="booking.php" style="background: #09192a"><i class="fa fa-home"></i> Homepage</a>
                    </li>
				</ul>
            </div>
        </nav>
       
        <div id="page-wrapper" style="text-align: center">
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div> 

                <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
								<div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="phone" type ="text" class="form-control" required>
                                            
                               </div>
                        </div>
                        
                    </div>
                </div>  
                  
            <div class="row">
                <div class="col-md-6 col-sm-6" > 
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            RESERVATION INFORMATION
                        </div>
                        <div class="panel-body">
                                    <div class="form-group">
                                                    <label>Type Of Room *</label>
                                                    <select name="troom"  class="form-control" required>
                                                        <option value selected ></option>
                                                        <option value="Superior Room">SUPERIOR ROOM</option>
                                                        <option value="Deluxe Room">DELUXE ROOM</option>
                                                        <option value="Guest House">GUEST HOUSE</option>
                                                        <option value="Single Room">SINGLE ROOM</option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                                    <label>Bedding Type</label>
                                                    <select name="bed" class="form-control" required>
                                                        <option value selected ></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Double">Double</option>
                                                        <option value="Triple">Triple</option>
                                                        <option value="Quad">Quad</option>                                                        
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                                    <label>No.of Rooms *</label>
                                                    <select name="nroom" class="form-control" required>
                                                        <option value selected ></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                    </div>
                                    
                                    <div class="form-group">
                                                    <label>Meal Plan</label>
                                                    <select name="meal" class="form-control"required>
                                                        <option value selected ></option>
                                                        <option value="Room only">Room only</option>
                                                        <option value="Breakfast">Breakfast</option>
                                                        <option value="Half Board">Half Board</option>
                                                        <option value="Full Board">Full Board</option>
                                                    </select>
                                    </div>
                                    <div class="form-group">
                                                    <label>Check-In</label>
                                                    <input name="cin" type ="date" class="form-control" required>
                                                    
                                    </div>
                                    <div class="form-group">
                                                    <label>Check-Out</label>
                                                    <input name="cout" type ="date" class="form-control" required>
                                    </div>
                                    <input type="submit" class="btn btn-danger" value="Submit">
                               </form>
                       </div>
                    </div>
                </div>
            </div>     
                </div>
                    </div>
        
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>
</html>


<?php
    require_once "config.php";

    $email = "";
    $phone = ""; 
    $room_type = "";
    $bed = "";
    $num_rooms = "";
    $meal = "";
    $total_cost  = 0;
    $cin = "";
    $cout = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $phone = $_POST["phone"]; 
    $room_type = $_POST["troom"];
    $bed = $_POST["bed"];
    $num_rooms = $_POST["nroom"];
    $meal = $_POST["meal"];
    $cin = $_POST["cin"];
    $cout = $_POST["cout"];

    $result = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
    $rooms = array("Superior Room" => 2200, "Deluxe Room" => 3200, "Guest House" => 1800, "Single Room" => 1500 );
    $beds = array("Single" => 100, "Double" => 200, "Triple" => 300, "Quad" => 400 );
    $meals = array("Room only" => 0, "Breakfast" => 100, "Half Board" => 200, "Full Board" => 300);
    
    $room_cost = $rooms[$room_type];
    $bed_cost = $beds[$bed];
    $meal_cost = $meals[$meal];

    $total_cost = $num_rooms * ($room_cost + $bed_cost + $meal_cost); //per day cost 
    $user_count = mysqli_num_rows($result);

    if($user_count < 1){
        echo "<script>alert('User email is not registered')</script>";
        mysqli_close($conn);
    } else {        
        $sql = "INSERT INTO bookings (email,phone,room_type,bed_type,num_rooms,meals,check_in,check_out,bill_total) 
                VALUES ('$email','$phone','$room_type','$bed','$num_rooms','$meal','$cin','$cout','$total_cost')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Booking successful!')</script>";
        } else {
            echo "<script>alert('Could not confirm booking')</script>";
            echo mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

// $res = mysqli_query($conn,"SELECT * FROM users WHERE email='abhi@gmail.com'");
// 	print "<table border=1><tr><th>NAME</th><th>USN</th><th>CGPA</th></tr>";
// foreach($res as $s)
// {
// 	print"<tr>";
// 	foreach($s as $k=>$v)
// 	{

// 		print "<td>".$v."</td>";
// 	}
// 	print"</tr>";
// }
// print"</table>";
?>


