<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Form</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      ..Update Room Type Form..
    </div>
  <div class="form">
    <?php
    require "connection.php";

    $id=$_GET['id'];
    $result= "SELECT * FROM room_num WHERE id='$id'";
    $query=mysqli_query($conn,$result);
    $row=mysqli_fetch_assoc($query);
    ?>
    <form action="Update_room_type.php?id=<?= $row['id'];?>" method="post">

      
       <div class="inputfield">
          <label>Add New Room Type</label>
          <select name="Room">
            <option value="">--Select--</option>
            <option value=1>Luxury_Single</option>
            <option value=2>Luxury_Double</option>
            <option value=3>Luxury_Triple</option>
            <option value=4>Luxury_Quad</option>
            <option value=5>Deluxe_Single</option>
            <option value=6>Deluxe_Double</option>
            <option value=7>Deluxe_Triple</option>
            <option value=8>Deluxe_Quad</option>
            <option value=9>Single_Single</option>
            <option value=10>Single_Double</option>
            <option value=11>Single_Triple</option>
            <option value=12>Single_Quad</option>

          </select>
       </div>

      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" required="">
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