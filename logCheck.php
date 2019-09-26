<?php
 session_start();
//checking the login credintials
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
      $uname = $_POST['username'];
      $pwd = $_POST['password'];
      if($uname == 'admin' && $pwd == '1234'){
        //set username as a session id
        $_SESSION['id'] = $uname;
      //directed to msg.php
        header("Location:msg.php");
      }
       else{
        //redirect to login page
				header("Location:login.php");
			}
    }
}
else{
	header("Location:login.php");
	}
  ?>