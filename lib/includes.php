<?php
//@TODO: temporary stuff!!
//error_reporting(-1);
//ini_set('display_errors', 'On');

include_once 'lib/db.php';
include_once 'lib/utils.php';
include_once 'lib/entity/User.php';
include_once 'lib/functions/user.php';
include_once 'lib/entity/Staff.php';


session_start ();

if (isset ( $_SESSION ["user"] )) {
	
	$user = $_SESSION ["user"];
	$uid = $user->id;
}

include_once 'lib/functions/default.php';

?>