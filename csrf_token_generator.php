<?php

session_start();
	//open the txt file which store the token
	$myfile = fopen("Tokens.txt", "w") or die("Unable to open file!");
	//genarate a random token value
	$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
	$txt = $_SESSION['token'].",";
	//save the token in server side
	fwrite($myfile, $txt);
	$session_id = session_id();
	//set the session id as a cookie
	setcookie('SesT',$session_id,time()+60*60*24*365,'/');
	$txt1 = $session_id."\n";
	//save the session id as in txt file too
	fwrite($myfile, $txt1);
	fclose($myfile);

	echo $_SESSION['token'];

  ?>