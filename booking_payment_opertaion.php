 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 </head>
 <body> 
  <div style="margin-top:50px;"></div>
<div class="container">

<?php
require "connection.php";

if (isset($_POST["g_id"]) ){

 $gid=$_POST["g_id"];
 
  $rdate=$_POST["r_d"];
 $rid=$_GET['id'];



$query_1 = mysqli_query($conn,"SELECT * FROM guest_info WHERE NID='$gid'");
$count=mysqli_num_rows($query_1);


$query_2 = mysqli_query($conn,"SELECT MAX(id) as m
                               FROM payment
                               WHERE guest_id='$gid' AND Status=2");
$count_2=mysqli_num_rows($query_2);
$row=mysqli_fetch_assoc($query_2);
$mid=$row['m'];



if($count===1){
	$query_3 = mysqli_query($conn,"SELECT *
                                   FROM roombook
                                   WHERE id=(SELECT MAX(id) as m
                                   FROM roombook
                                   WHERE guest_id=$gid) AND rdate='$rdate'");
	$count_3=mysqli_num_rows($query_3);




	if($count_3===1){
    $query_4 = mysqli_query($conn,"UPDATE room_num SET cusid='$gid' WHERE id='$rid'");
    $query_6 = mysqli_query($conn,"UPDATE payment SET Status=1 WHERE id='$mid'");
    if($query_4 and $query_6){
    	echo'
      <div class="alert alert-success">
          <strong>Success!</strong> Indicates a successful Booking
          </div>';
          echo '<div>
                    <form action="after_log.php" method="post">
                      <p class="lead font-italic">Wanna go back to profile?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
    }

	}else{
		echo'<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates This ID does not have any reservation.
</div>';
echo '<div>
                    <form action="after_log.php" method="post">
                      <p class="lead font-italic">Wanna go back to profile?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
	}


}else{
	echo'<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates This ID does not have any account.
</div>';
echo '<div>
                    <form action="after_log.php" method="post">
                      <p class="lead font-italic">Wanna go back to profile?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
}


}
?>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> 
 </body>
 </html>