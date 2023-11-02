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
      Unreservation Booking Form
    </div>
  <div class="form">
    <?php
    $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($FullUrl,"empty")== true)
    {
      echo "<p><h4> <i>You did not fill in all Forms! </i></h4></p><br>";
    }
    elseif (strpos($FullUrl,"invalid_username")== true)
    {
      echo "<p> <h4><i>You do not have a account! Please Sign up </i></h4></p><br>";
    }
    $id=$_GET['id'];
    ?>
    <form action="ub_up.php?id=<?= $id;?>" method="post">


       <div class="inputfield">
          <label>Guest ID</label>
          <input type="text" name="g_id" class="input" placeholder="Enter your Guest ID">
       </div> 
       <div class="inputfield">
          <label>Check In Date</label>
          <input type="datetime-local" name="c_in" class="input">
       </div>  
      <div class="inputfield">
          <label>Check Out Date</label>
          <input type="datetime-local" name="c_out" class="input">
       </div>
     
      <div class="inputfield">
          <label>Adult</label>
          <input type="text" name="adult" class="input" placeholder="Number of Adult">
       </div>
      <div class="inputfield">
          <label>Children</label>
          <input type="text" name="children" class="input" placeholder="Number of Children">
       </div> 
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> 
      <div class="inputfield">
        <input type="submit" name="add" value="Register" class="btn">
      </div>

    </form>
    </div>
</div>  
  
</body>
</html>