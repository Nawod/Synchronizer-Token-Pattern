<?php
session_start();
require_once 'token.php';

//cecking the login
if ( empty( $_SESSION['token']) ) {
  header("Location:login.php");
}
else{
  
}
//get token from hidden field
$val = $_POST["token"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Double Submit Cookies Pattern</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css.css" rel="stylesheet">
</head>

<body class="bdy">
<?php
	if(isset($_POST['updatepost'])){

    //pass the token which in the POST request and the session ID to 'token.php' for validate.
		if(token::checkToken($val,$_COOKIE['SesT'])){ ?>
			<h1 class="log" > Server request accepted</h1> 
			<div class="containerx">
    			<div class="row">
            <!--Display the token and the message-->
      				<div class="colX">
      					<p class="rsltX"><?php echo "Message : " .$_POST['updatepost'].""; ?> </p>
      					<p class="rslt"> <?php echo "CSRF token matched :
      					 (".$val.")"; ?> 
      					</p>
      				</div>
    			</div>
			</div>		
		<?php }
		else {
      //if csrf token invalid
	   		echo "Server request fail! , Unauthorized req!".$_COOKIE['SesT'];
		}
	}
?>
</body>
</html>