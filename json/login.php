<?php

include_once 'includes.php';  

// $array = array(); // this is your array variable to whom you are trying to save in a session
// $encode = json_encode($array);
// $decode = json_decode($encode);
// echo '<pre>';
// print_r($decode);

$out = false;


if (isset($_POST["username"])) {
	
	debug("trying to log");

	$username = $_POST["username"];
	$password = $_POST["pass"];
	
	debug("checking login");
	$user = login($username, $password);
	
	if ($user) {

		debug(  "User logged<br/>");
		session_start();
		$_SESSION["user"]=$user;
		
		if (isset($_POST["remember"])) {
			//set session cache not expired
			debug("set - 2 weeks");
			$_SESSION['expire'] = time() + (14 * 24 * 60 * 60);
		}
		
		debug( "And in the session<br/>");
		debug(print_r($_SESSION,true));
	
		$out = $user;
	
	} else {
		$out = false;
	}
}

echo json_encode($out);
?>
