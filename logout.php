<?php
include_once 'lib/includes.php';
//$page='logout';
// session_unset("user");
$_SESSION["user"]=NULL;
session_destroy();

$page='logout';

header('Location: /todo');
die();

?>

