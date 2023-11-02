<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Form</title>
  <link rel="stylesheet" href="admin/styles.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Room Booking Form
    </div>
  <div class="form">

        <?php
    require "connection.php";

    $id=$_GET['id'];
    $result= "SELECT * FROM room_num WHERE id='$id'";
    $query=mysqli_query($conn,$result);
    $row=mysqli_fetch_assoc($query);
    ?>
    <form action="booking_payment_opertaion.php?id=<?= $row['id'];?>" method="post">

       <div class="inputfield">
          <label>Guest ID</label>
          <input type="text" name="g_id" class="input" placeholder="Enter your Guest ID">
       </div>
      <div class="inputfield">
          <label>Reservation Date</label>
          <input type="date" name="r_d" class="input">
       </div> 
      
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </form>
    </div>
</div>  
  
</body>
</html>