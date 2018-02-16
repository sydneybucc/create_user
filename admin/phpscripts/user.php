<?php
  function createUser($fname, $username, $password, $email, $userlvl) {
    include('connect.php');
    $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', DEFAULT, '{$userlvl}', 'no')";
    //echo $userString;

    $userQuery = mysqli_query($link, $userString);
      if($userQuery) {
         
        //This is the email that is sent to the user trying to create an account. This is how they will recieve their system generated password to login.
        $to = $email;
        $subject = "Here is your username, password, and url to the login page!";
        $msg = "Username: ".$username."\n\nPassword: ".$password."\n\nURL: url: http://localhost/create_user/admin/admin_login.php";
        mail($to, $subject, $msg);
        //$direct = $direct."?name={$name}";

        
        redirect_to("admin_index.php");
      }else{
        $message = "There was a problem with setting up this user. Maybe reconsider your hiring practices.";
        return $message;
      }

    mysqli_close($link);
  };
 ?>
