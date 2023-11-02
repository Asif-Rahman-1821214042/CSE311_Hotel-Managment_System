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

if (isset($_POST["userid"])) {

 $nid=$_POST["userid"];
 $mail=$_POST["email"];
 $fname=$_POST["fname"];
 $lname=$_POST["lname"];
  $phn=$_POST["phn"];
 $password=$_POST["password"];
 $config_password=$_POST["cpassword"];
 $cryp_pass=crypt($password,"st");
 $cryp_cpass=crypt($config_password,"st");
 $q=$_POST["choice"];
 $a=$_POST["ans"];

  
  if($cryp_pass===$cryp_cpass){
  	   $query_count=mysqli_query($conn,"SELECT * FROM guest_info WHERE NID='$nid'");
       $count=mysqli_num_rows($query_count);
       if($count===0){
   $query=mysqli_query($conn,"INSERT INTO guest_info(NID,first_name,last_name,email,phn_number,pass,conf_pass,choice,c_ans)
	VALUES ('$nid','$fname','$lname','$mail','$phn','$cryp_pass','$cryp_cpass','$q','$a')");
   if($query)
   {
	   header("Location: index.php?Sucessfully_Account_created");
   }else{
	   header("Location: index.php?Sucessfully_failed");
   }
}else{
	echo'<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates This ID already exist.
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
}
  }
  else{
  	echo'<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates confirm password did not match.
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
  }
}else{
       echo'<div class="alert alert-danger">
  <strong>Danger!</strong> 404,Sorry For The Problem
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
     }

?>

</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> 
 </body>
 </html>
