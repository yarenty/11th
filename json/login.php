<?php

include_once 'includes.php';

$out = false;

//TEST
//$dat = urldecode(substr(file_get_contents('php://input'),6));
//REAL
$dat = urldecode(file_get_contents('php://input'));

$in = json_decode($dat);

$u = new Manager();
$u -> username = $in -> username;
$u -> password = $in -> password;

if ($u -> login()) {
	$out = $u;

} else {
	$out = false;
}

echo json_encode($out);
?>
