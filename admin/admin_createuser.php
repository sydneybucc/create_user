<?php
  //ini_set('display_errors',1);
  //error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  <script type="text/javascript" src="../admin_main.js"></script>
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
</head>
<body>
	<h1>Welcome to your admin page</h1>
  <?php if(!empty($message)){echo $message;} ?>
  <form action="admin_createuser.php" method="post">
    <label>First Name:</label>
    <input type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;} ?>">
    <label>Username:</label>
    <input type="text" name="username" value="<?php if(!empty($username)){echo $username;} ?>">
    <!-- <label>Password</label>
    <input type="text" name="password" value="<?php if(!empty($password)){echo $password;} ?>"> Taking this out so new user can't make a password and is given it via email instead-->
    <label>Email:</label>
    <input type="text" name="email" value="<?php if(!empty($email)){echo $email;} ?>">
    <label>User Level:</label>
    <select name="userlvl">
      <option value="">Please select a user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select>
    <input type="submit" name="submit" value="Create User">
  </form>

</body>
</html>
