<?php
//@TODO: temporary stuff!!
error_reporting(-1);
ini_set('display_errors', 'On');

//DB
include_once '../lib/db.php';
//standard helpers
include_once '../lib/utils.php';

//USERS
//include_once '../lib/entity/User.php';
include_once '../lib/entity/Staff.php';
include_once '../lib/entity/Manager.php';

header("content-type:application/json");
?>