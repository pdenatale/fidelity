<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8" />
<title>Fidelity</title>
<link rel="stylesheet" href="css/stylie.css" type="text/css"
	media="screen" />
</head>
<body>

	<p>&nbsp;</p>
	<div id="content">
		<h1>Fidelity</h1>
		<h2>Sign Up</h2>

		<?php
		include 'lib/dbConn.php';
		include 'lib/strUtils.php';

		if(isset($_POST['signup']) && $_POST['signup'] == "signup" )
		{
			$username = stripslashes( $_REQUEST['username'] );
			$password = stripslashes( $_REQUEST['password'] );
			$email = stripslashes( $_REQUEST['email'] );
			$brand = stripslashes( $_REQUEST['brand'] );

			if( !isFormFieldValid($username))
				echo "The username you have choose has invalid characters!!!";
			else
			{
				$result = mysql_query("SELECT login FROM brand WHERE login = '$username'");
				$row = mysql_fetch_array($result);

				if( isset($row)&& $username != "" && $username == $row{'login'})
					echo 'Sorry, the username <b>'.$username.'</b> is already in use.';
				else
					if( !isEmailValid($email) )
					echo 'Please enter a valid email address.';
				else {
					$md5pass =  md5($_POST['password']);
					$insert = "INSERT INTO brand(login,email,password,name)
					VALUES('".$username."','".$email."','".$md5pass."','".$brand."')";
					mysql_query($insert);

					//login the new user
					$result = mysql_query("SELECT * FROM brand WHERE login='$username' AND password='$md5pass'");
					$row = mysql_fetch_array($result);
					if(isset($row))
					{
						session_start();
						// Login good, create session variables
						$_SESSION["valid_id"] = $row{'id'};
						$_SESSION["valid_user"] = $username;
						$_SESSION["valid_time"] = time();
						?>
		<script type="text/javascript"> top.location.href='members.php'</script>
		<?
		exit;
					}

				}
			}
		}
		?>

		<form id="signup-form" name="signup-form" action="signup.php"
			method="post">
			<p>
				<label for="username">Username: </label> <input type="text"
					name="username" id="username" />
			</p>
			<p>
				<label for="email">Email: </label> <input type="text" name="email"
					id="email" length="40" size="35" />
			</p>
			<p>
				<label for="password">Password: </label> <input type="password"
					name="password" id="password" />
			</p>
			<p>
				<label for="brand">Brand: </label> <input type="text" name="brand"
					id="brand" />
			</p>

			<p>
				<input type="submit" id="login" name="login" value="SignUp" />
			</p>
			<input type="hidden" name="signup" value="signup" />
		</form>
		<div id="message"></div>
	</div>
</body>
</html>
