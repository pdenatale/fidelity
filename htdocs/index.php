<?php 
session_start();
if ($_SESSION["valid_user"])
{
?> <script type="text/javascript"> top.location.href='members.php'</script> <?
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8" />
<title>Fidelity</title>
<link rel="stylesheet" href="css/stylie.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</head>
<body>

<p>&nbsp;</p>
<div id="content">
  <h1>Fidelity</h1>
  <form id="form1" name="form1" action="doLogin.php" method="post">
    <p>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" />
    </p>
    <p>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" />
    </p>
    <p>
      <input type="submit" id="login" name="login" value="Login"/>
    </p>
  </form>
    <div id="message"></div>
    <p><a href="signup.php">Click here to Sign Up!</a></p>
</div>
</body>
</html>