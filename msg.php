<?php
 session_start();

//checking the login 
if ( empty( $_SESSION['id']) ) {
  header("Location:login.php");
}
else{

}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Double Submit Cookies Pattern</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <script>
      //ajax call
      $(document).ready(function(){
  
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      //set csrf token as a hidden field in post request
      document.getElementById("csrftoken").setAttribute('value', this.responseText) ;
      }
  
  
      };
      //generate and get csrf token 
      xhttp.open("GET", "csrf_token_generator.php", true);
      xhttp.send();
  
      });
    </script>
  </head>

  <body class="bdy">
    <h1 class="log">Login Successfully</h1>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="box">
                  <!--form to send a message and csrf token-->
                      <form class="form" action="result.php" method="post">
                            <div class="form-group">
                                <label for="username" class="text-white"><h4>Send a Message</h4></label><br>
                                <input type="text" name="updatepost" class="inpt">
                            </div>
                            <!--pass csrf token as a hidden field-->
                            <div id="div1">
                              <input type="hidden" name="token" value="" id="csrftoken"/>
                            </div>
                            <div class="form-group">
                                <input type="submit"  class="btn" value="updatpost">
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body> 
</html>
