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
      Reservation Form
    </div>
  <div class="form">
    <?php
    session_start();
    $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($FullUrl,"empty")== true)
    {
      echo "<p><h4> <i>You did not fill in all Forms! </i></h4></p><br>";
    }
    elseif (strpos($FullUrl,"invalid_username")== true)
    {
      echo "<p> <h4><i>You do not have a account! Please Sign up </i></h4></p><br>";
    }
    


    $id=$_SESSION["id"];


    ?>

    <form action="reservation_insert.php?id=<?= $id;?>" method="post">
       <div class="inputfield">
          <label>Room</label>
          <select name="Room">
            <option value="">--Select--</option>
            <option value="Luxury Room">Luxury Room</option>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Single Room">Single Room</option>
          </select>
       </div>
     <div class="inputfield">
          <label>Number Of Bedding</label>
          <select name="bedding">
            <option value="">--Select--</option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Triple">Triple</option>
            <option value="Quad">Quad</option>
          </select>
       </div> 

      
      <div class="inputfield">
          <label>Reservation Date</label>
       <input type="date" class="input" name="rdate">
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
      <div>
          <p class="message">Wanna Go Back to Profile? <a href="g_after_log.php">Back</a></p>
       </div>
    </form>

    </div>

</div>  
  
</body>
</html>