<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Merchant's Row | Buy, Sell, Trade, Expand, Dominate</title>
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="../images/titleIcon.ico" type="image/png">
</head>
<style>
div.page-container {  background-image:url('images/background.jpg');
			 background-color:#cccccc;
}
div.feature-box { background-image:url('images/box.jpg');
	     	    background-color:#cccccc;
}
</style>

<body>
<div class="page-container">
	<img src="images/banner-grey2.gif"></img>
	<div class="log-in" height="30px">
		<?php
		$lifetime=7200;
		session_start();
		setcookie(session_name(),session_id(),time()+$lifetime);
		if (isset($_SESSION['user'])) {
			header('Location: http://deepblue.cs.camosun.bc.ca/~comp19908/MerchantsRow');		//if so, reload the main page with an error message
	exit();
		} ?>
	</div>
	<div class="left-col">
		<span>Merchant's Row is a persistant online trading simulator that takes place in a fictional medieval city. Players begin as a simple merchant and must expand their influence through trade, trickery and tactics.<span>
	</div>
	<div class="right-col">
		<?php
		$incorrectLogin = false;
		$alreadyLogged = false;
		
		if (isset($_GET['incorrectLogin'])) {
			$incorrectLogin = $_GET['incorrectLogin'];
		}
		if (isset($_GET['alreadyLogged'])) {
			$alreadyLogged = $_GET['alreadyLogged'];
		}
		
		if ($incorrectLogin) {
		echo "<span style='color: red;'>Incorrect Username or password.</span>";
		}
		elseif ($alreadyLogged) {
		echo "<span style='color: red;'>You are already logged in on a different computer.</span>";
		}
		Else {
		echo "<span>Enter your username and password to log in:</span>";
		} ?>
		
		<div class="feature-box">
			<form id="login-form" method="post" action="scripts/LogIn.php">
				User Name:
				<input type="text" name="username"
							required id="username"
							placeholder="Enter your username">
				<br />
				Password:
				<input type="password" name="password"
							required id="password"
							placeholder="Enter your password">
				<br />
				<button class="submit" type="submit">
					Log In
				</button>
			</form>
		</div>
	</div>
	<div class="left-col">
		<br>
		<?php
		$userExists = false;
		$success = false;
		
		if (isset($_GET['userExists'])) {
			$userExists = $_GET['userExists'];
		}
		if (isset($_GET['success'])) {
			$success = $_GET['success'];
		}
		
		if ($userExists) {
		echo "<span style='color: red;'>That username is taken.</span>";
		}
		elseif ($success) {
		echo "<span style='color: red;'>Your account has been created.</span>";
		}
		Else {
		echo "<span>To create a new account and begin playing, fill out the New Player form below:</span>";
		} ?>
		<div class="feature-box">
			New User Form:
			<form id="new-user-form" method="post" action="scripts/AddUser.php">
				Enter your desired user name:
				<input type="text" name="username"
							required id="username"
							placeholder="Between 4 and 20 characters"
							pattern=".{4,20}">
				<br />
				Choose a password:
				<input type="password" name="password"
							required id="password"
							placeholder="Between 6 and 20 characters"
							pattern=".{6,20}">
				<br />
				Enter your email address:
				<input type="text" name="email"
							required id="email"
							placeholder="Email address">
				<br />
				Enter your date of birth:
				<input type="date" name="DoB"
							required id="DoB"
							placeholder="Date of birth">
				<br />
				<button class="submit" type="submit">
					Create New Account
				</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>