<?php

include_once 'includes.php';

echo "HERE what comes in POST:\n";

//TEST
$dat = urldecode(substr(file_get_contents('php://input'),6));
//REAL
//$dat = urldecode(file_get_contents('php://input'));

var_dump($dat);

echo "\n\n try to decode 'value':\n";

$in = json_decode($_POST["value"]);

echo "DECODED, and ...:\n";

var_dump($in);

echo "\n";
echo 'if start with "[ ]" - then need to be $x[y]->fields if starts with "{ }" then just $x->fields';

echo "\nEXAMPLE OUT [ARRAY]:\n";


$s1 = new Staff();

$s1->id = 1; 
$s1->firstname = "Elsa";
$s1->lastname ="TheBest";
$s1->picture ="http://www.yarenty.com/11th/img/baby.jpeg";
$s1->experience = 99;
$s1->rating = 5;


$s2 = new Staff();
$s2->id = 1; 
$s2->firstname = "John";
$s2->lastname ="Doe";
$s2->picture ="http://www.yarenty.com/11th/img/brad.jpeg";
$s2->experience = 40;
$s2->rating = 2;
 //where work - history
 //

$x = array();
$x[0] = $s1;
$x[1] = $s2;



echo json_encode($x);


echo "\n\nEXAMPLE OUT [structure]:\n\n";

echo json_encode($s1);

?>