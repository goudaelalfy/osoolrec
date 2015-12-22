<?php

class osool_messagesModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $person_name,  $person_phone,  $person_moile,  $person_email,  $message)
	{
		if($id==0)
		{
			$sql="INSERT INTO `osool_messages` (  `person_name`,  `person_phone`,  `person_moile`,  `person_email`,  `message`)
			 VALUES ( '$person_name',  '$person_phone',  '$person_moile',  '$person_email',  '$message')";
		}
		else
		{
			$sql="UPDATE `osool_messages` SET  `person_name`='$person_name',`person_phone`='$person_phone',`person_moile`='$person_moile',`person_email`='$person_email',`message`='$message' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `osool_messages` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`,  `person_name`,  `person_phone`,  `person_moile`,  `person_email`,  `message`   FROM `osool_messages`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`,  `person_name`,  `person_phone`,  `person_moile`,  `person_email`,  `message`  FROM `osool_messages` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `osool_messages`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
