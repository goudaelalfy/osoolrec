<?php

class business_fieldModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $name_en,$name_ar)
	{
		if($id==0)
		{
			$sql="INSERT INTO `business_field` (`name_en`,`name_ar`)
			 VALUES ( '$name_en','$name_ar')";
		
		}
		else
		{
			$sql="UPDATE `business_field` SET  `name_en`='$name_en',`name_ar`='$name_ar' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `business_field` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`,  `name_en`, `name_ar`  FROM `business_field`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT SELECT `id`,  `name_en`, `name_ar`  FROM `business_field` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `business_field`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
