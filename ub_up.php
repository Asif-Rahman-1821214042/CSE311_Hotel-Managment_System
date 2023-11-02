
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

if (isset($_POST["add"])) {


 $gid=$_POST["g_id"];
 $rid=$_GET['id'];
 $cindate=$_POST["c_in"];
 $coutdate=$_POST["c_out"];
 $adult=$_POST["adult"];
 $children=$_POST["children"];

         $result40 = mysqli_query($conn,"SELECT * FROM room_num WHERE id='$rid'");
        $row40=mysqli_fetch_assoc($result40);
        $tid=$row40["t_id"];
        $result41 = mysqli_query($conn,"SELECT * FROM room WHERE id='$tid'");
        $row41=mysqli_fetch_assoc($result41);
       $room=$row41["type"];
        $bed=$row41["bedding"];

 if (empty($room)|| empty($bed) || empty($gid) || empty($cindate)|| empty($coutdate) || empty($adult)) {
  header("Location: reservation.php?empty");
  }

 else{
  $query_count=mysqli_query($conn,"SELECT * FROM guest_info WHERE NID='$gid'");
    $count=mysqli_num_rows($query_count);
    if($count!=0)
       {
        $query = mysqli_query($conn,"INSERT INTO roombook(guest_id,Room,bedding,rdate,cin,cout,adult,children)
         VALUES ('$gid','$room','$bed',NULL,'$cindate','$coutdate','$adult','$children')");

                $query42= mysqli_query($conn,"SELECT max(id) as i FROM roombook WHERE guest_id='$gid'");
        $row42=mysqli_fetch_assoc($query42);
        $rsv_id=$row42['i'];


        $mrp = $row41['price'];
        
        $daysquery = "SELECT DATEDIFF('$coutdate','$cindate') as d";
        $result2 = mysqli_query($conn,$daysquery);
        $row_2=mysqli_fetch_assoc($result2);
        $days=$row_2['d'];
        $total_balane=$mrp*$days;
      

        $sql = "INSERT INTO payment(guest_id,nroom,num_of_day,room_mrp,Amount,Status,rsv_id)
        VALUES ('$gid','$tid','$days','$mrp','$total_balane',1,'$rsv_id')";
        $sql1 = "UPDATE room_num SET cusid='$gid' where id='$rid'";

        $query2 = mysqli_query($conn,$sql);
        $query3 = mysqli_query($conn,$sql1);


        if($query)
   {
     header("Location: after_log.php?Sucessfully_insertated");
   }else{
     echo'<div class="alert alert-danger">
  <strong>Danger!</strong> Indicates insertion failed
</div>';
echo '<div>
                    <form action="after_log.php" method="post">
                      <p class="lead font-italic">Wanna go back to profile?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
   }
       }

     else{
      echo'<div class="alert alert-danger">
  <strong>Danger!</strong> Indicates This id does not exist
</div>';
echo '<div>
                    <form action="after_log.php" method="post">
                      <p class="lead font-italic">Wanna go back to profile?</p>
                        <button class="btn btn-info">Back</button>
                      </form>
                  </div>';
     }

       

}

}
?>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> 
 </body>
 </html>