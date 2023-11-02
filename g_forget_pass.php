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
 
if (isset($_POST["g_id"])) {

 $nid=$_POST["g_id"];
 $mail=$_POST["email"];
 $phn=$_POST["phn"];
 $password=$_POST["pass"];
 $config_password=$_POST["c_p"];
 $cryp_pass=crypt($password,"st");
 $cryp_cpass=crypt($config_password,"st");
 $c=$_POST["choice"];
 $a=$_POST["ans"];

       $query_count=mysqli_query($conn,"SELECT * FROM guest_info WHERE NID='$nid'");
       $count=mysqli_num_rows($query_count);
       $row=mysqli_fetch_assoc($query_count);
       if($count===1){
        if($mail===$row['email']){
          if($phn===$row['phn_number']){
            if($c===$row['choice']){
              if($a===$row['c_ans']){
                      if($cryp_pass===$cryp_cpass){
                        $query4=mysqli_query($conn,"UPDATE guest_info SET pass='$cryp_pass',conf_pass='$cryp_cpass' WHERE NID='$nid'");
                        if($query4){
                          header("Location: index.php?Sucessfully_Password_changed");
                        }else{
                          header("Location: index.php?Sucessfully_Not_Password_changed");
                        }


                      }else{
                        echo'<div class="alert alert-danger">
  <strong>Danger!</strong> Confirm password did not match
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
                      }
              }else{
                 echo'<div class="alert alert-danger">
  <strong>Danger!</strong> Answer did not match
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
              }

            }else{
             echo'<div class="alert alert-danger">
  <strong>Danger!</strong> question did not match
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
            }

          }else{
            echo'<div class="alert alert-danger">
  <strong>Danger!</strong> number did not match
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
          }

        }else{
          echo'<div class="alert alert-danger">
  <strong>Danger!</strong> mail did not match
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
        }

  
}else{
   echo'<div class="alert alert-danger">
  <strong>Danger!</strong> id does not exist
</div>';
echo '<div>
                    <form action="index.php" method="post">
                      <p class="lead font-italic">Wanna go back to Home Page?</p>
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