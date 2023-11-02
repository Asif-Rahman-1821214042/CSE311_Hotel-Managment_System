<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

<div class="login-page">
  <div class="form">
    <form class="login-form" action="g_after_log.php" method="post">
      <input type="text" name="userid" placeholder="id" required="" />
      <input type="password" name="password" placeholder="password" required="" />
      <button action="after_log.php">login</button>
      <p class="message">Not registered? <a href="g_signup.php">Create an account</a></p>
      <p class="message">forget password? <a href="g_forget_pass_form.php">change it</a></p>
    </form>

  </div>
  <script src="js/login.js"></script>
</div>
</body>
</html>