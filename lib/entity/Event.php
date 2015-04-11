<?php
class Event {

	var $id;
	var $user_id;
	var $createDate;
	var $createTime;
	var $displayDate;
	var $completeDate;
	var $completeTime;
	var $status_id;
	var $title;
	var $description;

	
	
	function load() {
		$db  = new db();
		$out = $db->getRow("select
			id, 
			user_id,
			create_date,
			display_date,
			complete_date,
			status_id,
			title,
			desription
		from ".$db->prefix."task where id = ".$this->id."");

		if ($out!=null) {
			$this->id = $out[0];
			$this->user_id= $out[1];
			$this->createDate= $out[2];
			$this->displayDate= $out[3];
			$this->completeDate= $out[4];
			$this->status_id= $out[5];
			$this->title= $out[6];
			$this->description= $out[7];
			$this->parent_id= $out[8];
		}
	}


	function save() {
		if ($this->createDate==null) {
			$this->createDate = date("Y-m-d");
			$this->createTime = date("H:i:s");
			$this->displayDate = date("Y-m-d");
		}
		$db  = new db();
		$sql = "insert into ".$db->prefix."task (
			 user_id,
			 create_date,
			 create_time,
			 display_date,
			 status_id,
			 title,
			 description
			) values ('".
		$this->user_id."','".
		$this->createDate."','".
		$this->createTime."','".
		$this->displayDate."','0','".
		mysql_real_escape_string($this->title)."','".
		mysql_real_escape_string($this->description)."','".
		$this->parent_id. "') ";
		
		debug("SQL::".$sql);
		
		$out = $db->insertRow( $sql);

		$this->id = $out;
		return $out;
			
	}

	
	
	
	function update() {
		$this->displayDate = date("Y-m-d");
		$db  = new db();
		$out = $db->insertRow("update  ".$db->prefix."task set 
			 title = '".mysql_real_escape_string($this->title)."',
			 description= '".mysql_real_escape_string($this->description)."',
			 display_date= '".$this->displayDate."'
			 where id = '".$this->id."';");
		//$this->id = $out;
			
	}
	
	
	
	function getStatus() {
		switch($this->status_id) {
			case 0:
				$out = "NEW";
				break;
			case 1:
				$out = "DONE";
				break;
			case -1:
				$out = "DELETED";
				break;
			default:
				$out = "unknown";
		}
		return $out;
	}
	
	function setDone() {
		$db  = new db();
		$this->completeDate = date("Y-m-d");
		$this->completeTime = date("H:i:s");	
		$sql = 	"update ".$db->prefix."task  set
			status_id  = '1',
			complete_date ='".$this->completeDate."',			
			complete_time ='".$this->completeTime."'
			where id = '".$this->id."'; " ;
		$out = $db->update($sql);
		
		$this->status_id = 1;
		return $sql;
	}
	
	
	
	function updateToday() {
		$db  = new db();
		$this->displayDate = date("Y-m-d");
		$sql = 	"update ".$db->prefix."task  set
			display_date ='".$this->displayDate."'
			where id = '".$this->id."'; " ;
		$out = $db->update($sql);
	
		return $sql;
	}

	function setDelete() {
		$db  = new db();
		$sql = "update ".$db->prefix."task  set
			 status_id  = '-1'
			 where id = '".$this->id."'; ";
		
		$out = $db->update($sql);
	
		$this->status_id = -1;
		return $sql;
	}

	
	function getUserTasks($uid){
		$db  = new db();
		$sql = "select
			id,
			user_id,
			display_date,
			status_id,
			title,
			description,
			parent_id
		from ".$db->prefix."task where user_id = ".$uid." and status_id<>'-1' ";
		
		debug("SQL::".$sql);
		$out = $db->getRowSet($sql);
		
		return $out;
	}

	function getTodayUserTasks($uid){
		$db  = new db();
		$date = date("Y-m-d");
		$sql = "select
			id,
			user_id,
			status_id,
			title,
			description,
			parent_id
		from ".$db->prefix."task where user_id = ".$uid." 
				and display_date = '".$date."' 
				and status_id<>'-1'";
		debug("SQL::".$sql);
		$out = $db->getRowSet($sql);
	
		return $out;
	}
	

	
}
?>