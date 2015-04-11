<?php

include_once 'includes.php';


$out = false;

//TEST
//$dat = urldecode(substr(file_get_contents('php://input'),6));
//REAL
$dat = urldecode(file_get_contents('php://input'));

$in = json_decode($dat);


$u = new Manager();

$u->username = $in->username;
$u->password = $in->password;
$u->name = $in->name;
$u->contactname = $in->contactname;
$u->geo = $in->geo;
$u->address = $in->address;
$u->email = $in->email;
$u->phone = $in->phone;
$u->facebook = $in->facebook;
$u->twitter = $in->twitter;




$x = $u->save();

echo json_encode(array("id" => $x));
?>