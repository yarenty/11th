<?php

include_once 'includes.php';

echo "<pre>";
var_dump($_POST);
$in = json_decode($_POST["value"]);

echo "and ...<br/>\n";

var_dump($in);

echo "</pre>\n<br/>";


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


var_dump($u);


$x = $u->save();

echo json_encode($x);
?>