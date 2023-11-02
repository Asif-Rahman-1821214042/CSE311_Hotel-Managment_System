<?php
require "connection.php";
session_start();
$id=$_SESSION["a_id"];
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$mail=$_POST["email"];
$pass=$_POST["password"];
$cpass=$_POST["password2"];
 $cryp_pass=crypt($pass,"st");
 $cryp_cpass=crypt($cpass,"st");
if(!empty($fname)){
$q1="UPDATE user_info SET first_name='$fname' WHERE id='$id'";
$r1=mysqli_query($conn,$q1);

}
if(!empty($lname)){
$q2="UPDATE user_info SET last_name='$lname' WHERE id='$id'";
$r2=mysqli_query($conn,$q2);
}
if(!empty($mail)){
$q4="UPDATE user_info SET email='$mail' WHERE id='$id'";
$r4=mysqli_query($conn,$q4);
}
if(!empty($pass) and !empty($cpass)){

  if($cryp_pass===$cryp_cpass){
    $q6="UPDATE user_info SET pass='$cryp_pass',conf_pass='$cryp_cpass' WHERE id='$id'";
    $r6=mysqli_query($conn,$q6);

  }
  else{
    header("Location: index.php?Unsucessfully_updated");
  }
}
if($q1 || $q2 || $q3 || $q4 || $q6){

     header("Location: index.php?Sucessfully_updated");
   
}
?>
