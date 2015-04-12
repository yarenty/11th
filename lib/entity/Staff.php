<?php

class Staff {

	var $id;
	var $username;
	var $password;
	var $firstname;
	var $lastname;
	var $picture;
	var $experience;
	var $rating;
	var $email;
	var $phone;
	var $facebook;
	var $twitter;
	var $address;
	var $geo;
	var $wage;
	var $skills;
	
	
 //where work - history
 //

	function login () {
		$db  = new db();
		$sql = "select
			id,
			firstname,
			lastname,
			email
		from ".$db->prefix."staff where username = '".mysql_real_escape_string($this->username)."' and ".
		" password = '".mysql_real_escape_string($this->password)."'";
		
		
		debug("SQL::"+ $sql);
		
		$out = $db->getRow($sql);
		
		if ($out!=null) {
			$this->id = $out[0];
			$this->firstname= $out[1];
			$this->lastname= $out[2];
			$this->email= $out[3];
			$this->password="***";
			return $this;
		}
		
		return false;
	}


	function save(){
		
		$db  = new db();
		$sql = "insert into ".$db->prefix."staff (
			username,
			password,
			email,
			firstname,
			lastname,
			picture,
			experience,
			rating,
			phone,
			facebook,
			address,
			geo,
			wage,
			skills,			
			twitter
			) values ('".
		mysql_real_escape_string($this->username)."','".
		mysql_real_escape_string($this->password)."','".
		mysql_real_escape_string($this->email)."','".
		mysql_real_escape_string($this->firstname)."','".
		mysql_real_escape_string($this->lastname)."','".
		mysql_real_escape_string($this->picture)."','".
		mysql_real_escape_string($this->experience)."','".
		mysql_real_escape_string($this->rating)."','".
		mysql_real_escape_string($this->phone)."','".
		mysql_real_escape_string($this->facebook)."','".
		mysql_real_escape_string($this->address)."','".
		mysql_real_escape_string($this->geo)."','".
		mysql_real_escape_string($this->wage)."','".
		mysql_real_escape_string($this->skills)."','".					
		mysql_real_escape_string($this->twitter)."') ";
		
		debug("SQL::".$sql);
		
		$out = $db->insertRow($sql);

		$this->id = $out;
		return $out;
	}

	
	
	function load () {
		$db  = new db();
		$sql = "select
			email,
			firstname,
			lastname,
			picture,
			experience,
			rating,
			phone,
			facebook,
			address,
			geo,
			wage,
			skills,			
			twitter
		from ".$db->prefix."staff where id = '".mysql_real_escape_string($this->id)."'";
		
		
		debug("SQL::"+ $sql);
		
		$out = $db->getRow($sql);
		
		if ($out!=null) {
			$this->email = $out[0];
			$this->firstname= $out[1];
			$this->lastname= $out[2];
			$this->picture= $out[3];
			$this->experience=$out[4];
			$this->rating=$out[5];
			$this->phone=$out[6];
			$this->facebook=$out[7];
			$this->address=$out[8];
			$this->geo=$out[9];
			$this->wage=$out[10];
			$this->skills=$out[11];
			$this->twitter=$out[12];
			// $this->=$out[];
			return $this;
		}
		
		return $out;
	}

	function change_password() {
		$db  = new db();
		$out = $db->update("update user set
			password = '".mysql_real_escape_string($this->password)."' 
			where id =	'".$this->id."';");
	}
	

}
?>