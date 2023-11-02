

                    <?php
                    require "connection.php";
                    session_start();
                    if(isset($_POST['userid']))
                    {
                      $id=$_POST['userid'];
                    $pass=$_POST['password'];
                    $_SESSION["a_id"] = $id;
                    $_SESSION["a_pass"] = $pass;
                  }else{
                    $id=$_SESSION["a_id"];
                    $pass=$_SESSION["a_pass"];
                  }
                  

                    $result= "SELECT * FROM user_info";
                    $result_1= "SELECT first_name,last_name FROM user_info WHERE id='$id'";
                    $result_2="SELECT COUNT(*) as c FROM room WHERE type='Luxury Room'";
                    $result_3="SELECT COUNT(*) as c FROM room WHERE type='Deluxe Room'";
                    $result_4="SELECT COUNT(*) as c FROM room WHERE type='Single Room'";

                    $query= mysqli_query($conn,$result);
                    $query_1= mysqli_query($conn,$result_1);
                    $query_2= mysqli_query($conn,$result_2);
                    $query_3= mysqli_query($conn,$result_3);
                     $query_4= mysqli_query($conn,$result_4);
                    $cyt_pass=crypt($pass,"st");
                    $lg_pass= substr($cyt_pass,0,10);
                    $log_reslt="";

                    while($row=mysqli_fetch_assoc($query))
                    {
                    	if($id===$row["id"] and $lg_pass===substr($row["pass"],0,10)){
                    	$log_reslt="passed";
                    	break;
                    }
                    }

                    if($log_reslt===""){
                    echo "Password Wrong, didn't match.<br>";
  
                    
                }
                else{
                $row_1=mysqli_fetch_assoc($query_1); 
                $row_2=mysqli_fetch_assoc($query_2); 
                $row_3=mysqli_fetch_assoc($query_3); 
                $row_4=mysqli_fetch_assoc($query_4); 
                echo '


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">'.$row_1["first_name"]." ".$row_1["last_name"].'</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="edit_pro.php">Edit Profile</a></li>
      <li><a href="show_employee.php">Employees</a></li>
        <li><a href="resrvation_table.php">Reservation</a></li>
        <li><a href="u_reservation_table.php">Unreserver</a></li>
        <li><a href="resv_delect_table.php">Resv_delect</a></li>
        <li><a href="admin_room.php">Room</a></li>
        <li><a href="add_room_form.php">Add Room</a></li>
        <li><a href="signup.php">Add Employee</a></li>
        <li><a href="guest_account_list.php">Guest Account</a></li>
        <li><a href="book_room.php">Book</a></li>
        <li><a href="unreserver_book_room.php">Ursv_Book</a></li>
        <li><a href="unbook_room.php">Unbook</a></li>
        <li><a href="index.php">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Who Am I?</h3>
  <img src="images/default-user.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>Im Manager of this hotel</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>Hellow, I am '.$row_1["first_name"]." ".$row_1["last_name"].' and I am the manger of this hotel </p>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Specification Of Our Hotel?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>'.$row_2["c"].' Superior Room of all variant</p>
      <img src="images/g2.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>'.$row_3["c"].' Deluxe Room of all variant</p>
      <img src="images/g4.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>'.$row_4["c"].' Single Room of all variant</p>
      <img src="images/g8.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p> 
</footer>

</body>
</html>
';
				
            }

                    ?>


