<?php

class osool_contact_usModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $page_text_en,  $page_text_ar)
	{
		if($id==0)
		{
			$sql="INSERT INTO `osool_contact_us` (  `page_text_en`,  `page_text_ar`)
			 VALUES ( '$page_text_en',  '$page_text_ar')";
		}
		else
		{
			$sql="UPDATE `osool_contact_us` SET  `page_text_en`='$page_text_en',`page_text_ar`='$page_text_ar' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `osool_contact_us` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`,  `page_text_en`,  `page_text_ar`   FROM `osool_contact_us`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`,  `page_text_en`,  `page_text_ar`  FROM `osool_contact_us` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `osool_contact_us`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
