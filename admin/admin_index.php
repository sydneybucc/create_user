<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.css">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/admin_main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<div class="expanded row">
	<h1 class="php_h1">Welcome To Your Admin Page, Boss!</h1>
</div>
<ul class="expanded row index_list">
	<li><a href="admin_createuser.php">Create User</a></li>
	<li><a href="phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
</ul>
</body>
</html>