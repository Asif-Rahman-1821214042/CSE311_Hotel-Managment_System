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
      forget pass
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
    ?>
    <form action="g_forget_pass.php" method="post">
 
       <div class="inputfield">
          <label>Guest ID</label>
          <input type="text" name="g_id" class="input" placeholder="Enter your Guest ID" required="">
       </div> 
        <div class="inputfield">
          <label>Email</label>
          <input type="email" name="email" class="input" placeholder="Enter your mail" required="">
       </div> 


      <div class="inputfield">
          <label>phone</label>
          <input type="text" name="phn" class="input" placeholder="enter your number" required="">
       </div>

      <div class="inputfield">
         <label>Answer</label>
      <select name="choice" required="">
      <option value="">--Select--</option>
      <option value=1>Who is your best childhood friend?</option>
      <option value=2>What is your favourite place?</option>
      </select>
      </div>

      <div class="inputfield">
          <label>Answer</label>
          <input type="text" name="ans" class="input" placeholder="enter your answer" required="">
       </div>
       <div class="inputfield">
          <label>password</label>
          <input type="password" name="pass" class="input" placeholder="enter your answer" required="">
       </div>
       <div class="inputfield">
          <label>confirm password</label>
          <input type="password" name="c_p" class="input" placeholder="enter your answer" required="">
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