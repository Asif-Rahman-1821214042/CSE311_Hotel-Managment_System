<?php
require "connection.php";
session_start();
$id=$_SESSION["id"];
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$phn=$_POST["phone"];
$mail=$_POST["email"];
$pass=$_POST["password"];
$cpass=$_POST["password2"];
 $cryp_pass=crypt($pass,"st");
 $cryp_cpass=crypt($cpass,"st");
if(!empty($fname)){
$q1="UPDATE guest_info SET first_name='$fname' WHERE NID='$id'";
$r1=mysqli_query($conn,$q1);

}
if(!empty($lname)){
$q2="UPDATE guest_info SET last_name='$lname' WHERE NID='$id'";
$r2=mysqli_query($conn,$q2);
}
if(!empty($phn)){
$q3="UPDATE guest_info SET phn_number='$phn' WHERE NID='$id'";
$r3=mysqli_query($conn,$q3);
}
if(!empty($mail)){
$q4="UPDATE guest_info SET email='$mail' WHERE NID='$id'";
$r4=mysqli_query($conn,$q4);
}
if(!empty($pass) and !empty($cpass)){

  if($cryp_pass===$cryp_cpass){
    $q6="UPDATE guest_info SET pass='$cryp_pass',conf_pass='$cryp_cpass' WHERE NID='$id'";
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
