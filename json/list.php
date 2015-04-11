<?php

include_once 'includes.php';

$s1 = new Staff();

$s1->id = 1; 
$s1->firstname = "Elsa";
$s1->lastname ="TheBest";
$s1->picture ="http://www.yarenty.com/11th/img/baby.jpeg";
$s1->experience = 99;
$s1->rating = 5;


$s2 = new Staff();
$s2->id = 2; 
$s2->firstname = "John";
$s2->lastname ="Doe";
$s2->picture ="http://www.yarenty.com/11th/img/brad.jpeg";
$s2->experience = 40;
$s2->rating = 2;


$s3 = new Staff();
$s3->id = 3; 
$s3->firstname = "Adam";
$s3->lastname ="Apple";
$s3->picture ="http://www.yarenty.com/11th/img/man.jpeg";
$s3->experience = 33;
$s3->rating = 2;


$s4 = new Staff();
$s4->id = 4; 
$s4->firstname = "Guy";
$s4->lastname ="Kawasaki";
$s4->picture ="http://www.yarenty.com/11th/img/guy.jpeg";
$s4->experience = 52;
$s4->rating = 4;
 //where work - history
 //

$x = array();
$x[0] = $s1;
$x[1] = $s2;
$x[2] = $s3;
$x[3] = $s4;


echo json_encode($x);
?>