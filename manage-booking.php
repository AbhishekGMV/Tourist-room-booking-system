<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/custom-styles.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <title>Manage booking</title>

    <style>
        th {
            background-color: #149b90;
        }
        table, th, td {
            border: 2px solid black;
        }
    </style>

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

    <div class='container'>
        <h2 style="text-align: center">MANAGE BOOKINGS</h2>
        <form action="" method="post">
            <input type="email" class="form-control" name="email" placeholder="Your email" required></input><br>
            <input type="submit" class="btn btn-info btn-sm" value="View" name="view">
            <input type="reset" class="btn btn-danger btn-sm" value="Reset" name="reset"> <br> <br>
        </form>
    </div>

        <?php
        require_once "config.php";
        if(isset($_POST['view'])){
            $email = $_POST["email"];
            $result = mysqli_query($conn,"SELECT * FROM bookings WHERE email='$email'");
            $total_cost = 0;
            if(mysqli_num_rows($result) >= 1 ){
                print "<table class='booking-table' border=1>
                    <tr>
                        <th>Booking ID</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Room type</th>
                        <th>Bed type</th>
                        <th>Number of rooms</th>
                        <th>Meals</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Booking date</th>
                        <th>Bill total</th>
                    </tr>";
            foreach($result as $s)
            {
                $total_cost += $s['bill_total'];
                print"<tr>";
                foreach($s as $k=>$v)
                {
                    print "<td>".$v."</td>";

                }
                print"</tr>";
            }
            print"</table>";
            print "<h3 style='text-align: center'>Total: RS. $total_cost</h3>
            <form id='cancellation-form' style='text-align: center' method='POST' class='container'>
                <div class='jumbotron' style= 'background-color: #bdabab'>
                <h3>Booking cancellation</h3>
                <input type='email' name='email' class='form-control' placeholder='Email ID' ></input><br>
                <input type='text' name='bid' class='form-control' placeholder='Booking ID' ></input><br>
                <input type='submit' name='cancel'  class='btn btn-primary btn-sm' value='Cancel'>
                <input type='submit' name='cancel-all' class='btn btn-danger btn-sm' value='Cancel all'>
                <div> <small><b>Enter booking ID to cancel booking or 'cancel all' to cancel all the bookings</b></small> </div>
                </div>
            </form>";
            } else {
                print "<div class='container'> <h4>No records found for <h4 style='color:red'> '$email'!</h4> </div>";
            }
        } elseif (isset($_POST['cancel'])){
            $book_id = $_POST['bid']; 
            $mail_id = $_POST['email']; 
            print "<script>alert('$mail_id')</script>";
            mysqli_query($conn, "DELETE FROM bookings WHERE bid = '$book_id' AND email = '$mail_id'");
            $res = mysqli_affected_rows($conn);
            if($res < 1){
                print "<script>alert('No bookings in mentioned booking ID!')</script>";
            } else {
                print "<script>alert('Booking cancelled!'); 
                        </script>";
            }
        } elseif (isset($_POST['cancel-all'])){
            $mail_id = $_POST['email'];
            print "<script>alert($mail_id);</script>";
            mysqli_query($conn, "DELETE FROM bookings WHERE email = '$mail_id'");
            $result = mysqli_affected_rows($conn);
            if($result < 1){
                print "<script>alert('No bookings to cancel!')</script>";
            } else {
                print "<script>alert('Booking cancelled!'); 
                            window.location.href = 'booking.php';
                        </script>";
            }
        } 
        ?>
        </div>  
    </div>
</body>
</html>

<style>
    <?php include "style.css"; ?>
</style>
