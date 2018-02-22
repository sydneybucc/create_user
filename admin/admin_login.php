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
<link rel="stylesheet" href="css/admin_main.css">
</head>
<body>

<div class="expanded row">
	<h2>LOGIN</h2>
</div>
	<?php if(!empty($message)){ echo $message;} ?>
<div class="expanded row" id="contactArea">
	<form id="contactForm" class="small-8 small-offset-2 large-8 large-offset-2" action="admin_login.php" method="post">
		<label>Username:</label>
		<input type="text" required id="username" name="username" size="30" value="">
		<br>
		<label>Password</label>
		<input type="text" required id="password" name="password" size="30" value="">
		<br><br>
		<input id="submit" type="submit" name="submit" value="Show me the money">
	</form>
</div>

</body>
</html>