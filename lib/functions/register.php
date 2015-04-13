<?php


$register_success=false;

$error_name=false;
$error_email=false;
$error_password=false;
$error_timezone=false;
$error_captcha=false;
$error_already=false;

$u = new Staff();
 
if (isset($_POST["register"])) {
	$register_success=true;
	//phpinfo();

if (!isset($_POST["username"]) || strlen($_POST["username"])<2 ) {
	$error_name=true;
	$register_success=false;
	
}
if (isset($_POST["username"])) $u->username = $_POST["username"];

if (!isset($_POST["mail"]) || strlen($_POST["mail"])<4) {
	$error_email=true;
	$register_success=false;
}
if (isset($_POST["mail"])) $u->email = $_POST["mail"];
		
if (!isset($_POST["pass"]) || strlen($_POST["pass"])<6 ) {
	$error_password=true;
	$register_success=false;
}

if (isset($_POST["pass"])) $u->password = $_POST["pass"];

if (!isset($_POST["captcha"]) || ($_POST["captcha"]!=4)) {
	$error_captcha=true;
	$register_success=false;
}

debug("CAPTCHA:".$_POST["captcha"]);


			$u->firstname= $_POST["firstname"];
			$u->lastname= $_POST["lastname"];
			//picture,
			$u->experience= $_POST["experience"];
			//$u->rating= $_POST["rating"];
			$u->phone= $_POST["phone"];
			$u->facebook= $_POST["facebook"];
			$u->address= $_POST["address"];
			//geo,
			$u->wage= $_POST["wage"];
			$u->skills= $_POST["skills"];			
			//twitter
 
 
//var_dump($u);

if ($register_success) {
	debug("call to save");
	$register_success = $u->save();
	debug("Registered::".$register_success);
	if (!$register_success) {
		$error_email = true;
		$error_already = true;
	}
}


}

?>