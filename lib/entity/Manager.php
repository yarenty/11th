<?php

class Manager {

	var $id;
	var $username;
	var $password;
	var $name;
	var $contactname;
	var $geo;
	var $address;
	var $email;
	var $phone;
	var $facebook;
	var $twitter;
	
	
 //where work - history
 //

	function login () {
		$db  = new db();
		$sql = "select
			id,
			name,
			contactname,
			email,
			phone
		from ".$db->prefix."manager where username = '".mysql_real_escape_string($this->username)."' and ".
		" password = '".mysql_real_escape_string($this->password)."'";
		
		
		debug("SQL::"+ $sql);
		
		$out = $db->getRow($sql);
		
		if ($out!=null) {
			$this->id = $out[0];
			$this->name= $out[1];
			$this->contactname= $out[2];
			$this->email= $out[3];
			$this->phone= $out[4];
			$this->password="***";
			return $this;
		}
		
		return false;
	}


	function save(){
		$db  = new db();
		$sql = "insert into ".$db->prefix."manager (
			username,
			password,
			email,
			name,
			contactname,
			geo,
			address,
			phone,
			facebook,
			twitter
			) values ('".
		mysql_real_escape_string($this->username)."','".
		mysql_real_escape_string($this->password)."','".
		mysql_real_escape_string($this->email)."','".
		mysql_real_escape_string($this->name)."','".
		mysql_real_escape_string($this->contactname)."','".
		mysql_real_escape_string($this->geo)."','".
		mysql_real_escape_string($this->address)."','".
		mysql_real_escape_string($this->phone)."','".
		mysql_real_escape_string($this->facebook)."','".
		mysql_real_escape_string($this->twitter)."') ";
		
		debug("SQL::".$sql);
		
		//echo $sql;
		
		$out = $db->insertRow($sql);

		$this->id = $out;
		return $out;
	}




	function load () {
		$db  = new db();
		$sql = "select
			email,
			name,
			contactname,
			geo,
			address,
			phone,
			facebook,
			twitter
		from ".$db->prefix."manager where id = '".mysql_real_escape_string($this->id)."'";
		
		
		debug("SQL::"+ $sql);
		
		$out = $db->getRow($sql);
		
		if ($out!=null) {
			$this->email = $out[0];
			$this->name= $out[1];
			$this->contactname = $out[2];
			$this->geo= $out[3];
			$this->address=$out[4];
			$this->phone=$out[5];
			$this->facebook=$out[6];
			// $this->=$out[];
			return $this;
		}
		
		return $out;
	}

	
	function change_password() {
		$db  = new db();
		$out = $db->update("update manager set
			password = '".mysql_real_escape_string($this->password)."' 
			where id =	'".$this->id."';");
	}
	

}
?>