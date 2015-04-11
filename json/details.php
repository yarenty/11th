<?php

include_once 'includes.php';

$s1 = new Staff();

$s1->id = 1; 
$s1->firstname = "Elsa";
$s1->lastname ="TheBest";
$s1->picture ="http://www.yarenty.com/11th/img/baby.jpeg";
$s1->experience = 99;
$s1->rating = 5;

$h=array();
$h[0] = array();
$h[0]["date"]="2015-04-10";
$h[0]["pub"]="Google";
$h[0]["hours"]=8;
$h[0]["position"]="bartender";
$h[0]["rating"]=5;
$h[0]["comment"]=null;

$h[1] = array();
$h[1]["date"]="2015-03-10";
$h[1]["pub"]="Microsoft";
$h[1]["hours"]=6;
$h[1]["position"]="beerman";
$h[1]["rating"]=2;
$h[1]["comment"]="pretty lazy";

$s1->history = $h;
 //where work - history
 //


echo json_encode($s1);
?>