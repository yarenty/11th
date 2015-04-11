<?php
class User {

	var $id;
	var $username;
	var $password;
	var $email;
	var $firstname;


	function login () {
		$db  = new db();
		$sql = "select
			id,
			firstname,
			email
		from ".$db->prefix."user where username = '".mysql_real_escape_string($this->username)."' and ".
		" password = '".mysql_real_escape_string($this->password)."'";
		
		
		debug("SQL::"+ $sql);
		
		$out = $db->getRow($sql);
		
		if ($out!=null) {
			$this->id = $out[0];
			$this->firstname= $out[1];
			$this->email= $out[2];
			$this->password="***";
			return $this;
		}
		
		return false;
	}


	function save(){
		$db  = new db();
		$sql = "insert into ".$db->prefix."user (
			username,
			password,
			email,
			firstname
			) values ('".
		mysql_real_escape_string($this->username)."','".
		mysql_real_escape_string($this->password)."','".
		mysql_real_escape_string($this->email)."','".
		mysql_real_escape_string($this->name)."') ";
		
		debug("SQL::".$sql);
		
		$out = $db->insertRow($sql);

		$this->id = $out;
		return $out;
	}


	function change_password() {
		$db  = new db();
		$out = $db->update("update user set
			password = '".mysql_real_escape_string($this->password)."' 
			where id =	'".$this->id."';");
	}
	
	
	
// future
/*
	function update(){
		$db  = new db();
		$out = $db->update("update user set
			firstname = '".mysql_real_escape_string($this->firstname)."', 
			address1= '".mysql_real_escape_string($this->address1)."',
	 		address2= '".mysql_real_escape_string($this->address2)."',
	 		city= '".mysql_real_escape_string($this->city)."',
	 		county= '".mysql_real_escape_string($this->county)."',
	 		postal= '".mysql_real_escape_string($this->postal)."',
	 		country= '".mysql_real_escape_string($this->country)."',
	 		countrytype= '".mysql_real_escape_string($this->countrytype)."',
	 		phone= '".mysql_real_escape_string($this->phone)."',
	 		email= '".mysql_real_escape_string($this->email)."'
	 		where id =	'".$this->id."';");
	}
	
*/


}
?>