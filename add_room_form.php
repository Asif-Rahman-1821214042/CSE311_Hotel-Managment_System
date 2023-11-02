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
      ..Add Room Form..
             <?php
       require "connection.php";
       $query="SELECT MAX(id) as m FROM room_num";
      $result = mysqli_query($conn,$query);
      $row=mysqli_fetch_assoc($result);
       echo '<br><label>NOTE: '.$row['m'].' is the last room number</label>';
       ?> 
    </div>
  <div class="form">
    <form action="add_room_insert.php" method="post">
       <div class="inputfield">
          <label>New Room Number</label>
          <input type="Number" name="r_id" class="input" placeholder="Enter your New Room Number" required="">
       </div> 
      
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
    </form><br>
    <form action="after_log.php" method="post">
      <div class="inputfield">
      <input type="submit" value="Back" class="btn">
      </div>
    </form>
    </div>
</div>  
  
</body>
</html>