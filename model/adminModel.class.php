<?php

class adminModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($password)
	{
		$sql="UPDATE `admin` SET `password`='$password'";
		$this->db->query($sql);
	}
	
	public function get_by_username_and_password($username, $password)
	{		
		
		$sql="SELECT `id`,  `username`,  `password` FROM `admin` WHERE `username`='$username' and `password`='$password'";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	
}
