<?php
  //ini_set('display_errors',1);
  //error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  //<script type="text/javascript" src="../admin_main.js"></script>
	confirm_logged_in();
  
  if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = random_password(16); //changed this to be the manual password
    $email = trim($_POST['email']);
    $userlvl = $_POST['userlvl'];
    if(empty($userlvl)){
      $message = "Please select a user level.";
    }else{
      $result = createUser($fname, $username, $password, $email, $userlvl);
      $message = $result;
    }
  }

  //found from https://hugh.blog/2012/04/23/simple-way-to-generate-a-random-password-in-php/
  function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.css">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/admin_main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<div class="expanded row">
  <h1 class="hidden">Welcome to your admin page</h1>
  <h2>Create a new user below</h2>
</div>
  <?php if(!empty($message)){echo $message;} ?>
  
<div class="expanded row createUserArea">
  <form class="small-8 small-offset-2 large-8 large-offset-2" action="admin_createuser.php" method="post">
    <label class="hidden">First Name:</label>
    <input type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;} ?>" placeholder="First Name:">
    <label class="hidden">Username:</label>
    <input type="text" name="username" value="<?php if(!empty($username)){echo $username;} ?>" placeholder="Username:">
    <!-- <label>Password</label>
    <input type="text" name="password" value="<?php if(!empty($password)){echo $password;} ?>"> Taking this out so new user can't make a password and is given it via email instead-->
    <label class="hidden">Email:</label>
    <input type="text" name="email" value="<?php if(!empty($email)){echo $email;} ?>" placeholder="Email:">
    <label class="hidden">User Level:</label>
    <select name="userlvl" placeholder="Select User Level:">
      <option value="">Please select a user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select>
    <input id="submit" type="submit" name="submit" value="Create User">
  </form>
</div>

</body>
</html>
