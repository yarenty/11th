<?php
function sanitize($string) {
	return mysql_real_escape_string($string);
}


class Debuger {
	var $debuginfo="";
	
	function add($i){
		$this->debuginfo.= $i."<br/>";
	}
	
	function get(){
		return $this->debuginfo;
	}
}

$d = new Debuger();

function debug($a) {
	global $d;
	$d->add($a);
}

function printdebug() {
	global $d;
	
	return $d->get();
}


class Errors {
	var $is = false;
	var $info ="";
	
	function addErrorDesc($desc) {
		$this->is = true;
		$this->info.= $desc."<br/>";
	}
}

$e = new Errors();

function isError() {
	global $e;
	return $e->is;
}


function getError() {
	global $e;
	return $e->info;
}

function setError($desc) {
	global $e;
	$e->addErrorDesc($desc);
}
?>