<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="css/admin_main.css">
</head>
<body>
	<h1>Welcome To Your Admin Page, Boss!</h1>
	<?php
	echo "<h2>Hello {$_SESSION["user_name"]}</h2>";
	?>
	<a href="admin_createuser.php">Create User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>