<?php
require "connection.php";

if (isset($_POST["add"])) {

 $room=$_POST["Room"];
 $bed=$_POST["bedding"];
 $gid=$_GET["id"];
 $rdate=$_POST["rdate"];
 $cindate=$_POST["c_in"];
 $coutdate=$_POST["c_out"];
 $adult=$_POST["adult"];
 $children=$_POST["children"];

 if (empty($room)|| empty($bed) || empty($gid) || empty($rdate) || empty($cindate)|| empty($coutdate) || empty($adult)) {
 	header("Location: reservation.php?empty");
  }

 else{
 	$query_count=mysqli_query($conn,"SELECT * FROM guest_info WHERE NID='$gid'");
    $count=mysqli_num_rows($query_count);
    if($count!=0)
       {
       	$query = mysqli_query($conn,"INSERT INTO roombook(guest_id,Room,bedding,rdate,cin,cout,adult,children)
         VALUES ('$gid','$room','$bed','$rdate','$cindate','$coutdate','$adult','$children')");
        $query41= mysqli_query($conn,"SELECT max(id) as i FROM roombook WHERE guest_id='$gid' and rdate='$rdate'");
        $row41=mysqli_fetch_assoc($query41);
        $rsv_id=$row41['i'];


        $result = mysqli_query($conn,"SELECT * FROM room WHERE type = '$room' AND bedding = '$bed'");
        $row=mysqli_fetch_assoc($result);
        $result1 = $row['id'];


        $mrp = $row['price'];
        
        $daysquery = "SELECT DATEDIFF('$coutdate','$cindate') as d";
        $result2 = mysqli_query($conn,$daysquery);
        $row_2=mysqli_fetch_assoc($result2);
        $days=$row_2['d'];
        $total_balane=$mrp*$days;
      

        $sql = "INSERT INTO payment(guest_id,nroom,num_of_day,room_mrp,Amount,Status,rsv_id)
        VALUES ('$gid','$result1','$days','$mrp','$total_balane',2,'$rsv_id')";

        $query2 = mysqli_query($conn,$sql);


       	if($query)
   {
	   header("Location: g_after_log.php?Sucessfully_insertated");
   }else{
	   header("Location: reservation.php?insertion_failed");
   }
       }

     else{
     	header("Location: reservation.php?invalid_username");
     }

       

}

}