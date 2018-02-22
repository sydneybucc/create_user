<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.css">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/admin_main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>

<div class="expanded row">
	<h2>LOGIN</h2>
	<h3>Sign in to view your portal</h3>
</div>
	<?php if(!empty($message)){ echo $message;} ?>
<div class="expanded row">
	<form id="contactForm" class="small-8 small-offset-2 large-8 large-offset-2" action="admin_login.php" method="post">
		<label class="hidden">Username:</label>
		<input type="text" required id="username" name="username" placeholder="Username:">
		<br>
		<label class="hidden">Password:</label>
		<input type="text" required id="password" name="password" placeholder="Password:">
		<br><br>
		<input id="submit" type="submit" name="submit" value="Sign In">
	</form>
</div>

</body>
</html>