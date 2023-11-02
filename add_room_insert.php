
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

if (isset($_POST["r_id"])) {


$rid=$_POST["r_id"];
$tid=$_POST["Room"]; 



 $query_count = mysqli_query($conn,"SELECT * FROM room_num where id='$rid'");
 $count=mysqli_num_rows($query_count);
 if($count===0){

 	 $query = mysqli_query($conn,"INSERT INTO room_num(id,t_id,cusid)
         VALUES ('$rid','$tid',NULL)");

 if($query)
   {
	   	echo'
		  <div class="alert alert-success">
          <strong>Success!</strong> Indicates a successful Insertion
          </div>';
          echo '<div>
										<form action="after_log.php" method="post">
											<p class="lead font-italic">Wanna go back to profile?</p>
      									<button class="btn btn-info">Back</button>
    									</form>
									</div>';
   }else{
	   	  echo'<div class="alert alert-danger">
  <strong>Danger!</strong> Indicates Insertion failed
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
  <strong>Warning!</strong> Indicates This Room Number already exist.
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