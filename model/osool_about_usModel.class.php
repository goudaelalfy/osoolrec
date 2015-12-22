<?php

class osool_about_usModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function save($id,  $title_en,  $title_ar,  $page_text_en,  $page_text_ar)
	{
		if($id==0)
		{
			$sql="INSERT INTO `osool_about_us` (`title_en`,  `title_ar`,  `page_text_en`,  `page_text_ar`,  `image`,  `image_type`)
			 VALUES ( '$title_en',  '$title_ar',  '$page_text_en',  '$page_text_ar')";
		}
		else
		{
			$sql="UPDATE `osool_about_us` SET  `title_en`='$title_en',`title_ar`='$title_ar',`page_text_en`='$page_text_en',`page_text_ar`='$page_text_ar' WHERE `id`=$id";
		}
		
		$this->db->query($sql);
	}
	
	public function delete($id)
	{
		$sql="DELETE FROM `osool_about_us` WHERE `id`=$id";
		$this->db->query($sql);
	}
	
	public function get_all()
	{		
		
		$sql="SELECT `id`,  `title_en`,  `title_ar`,  `page_text_en`,  `page_text_ar`,  `image`,  `image_type`   FROM `osool_about_us`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_by_id($id)
	{		
		
		$sql="SELECT `id`,  `title_en`,  `title_ar`,  `page_text_en`,  `page_text_ar`,  `image`,  `image_type`  FROM `osool_about_us` WHERE `id`=$id";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result;
	}
	
	public function get_max_id()
	{		
		
		$sql="SELECT max(`id`) FROM `osool_about_us`";
		$this->db->query($sql);
		
		$result = $this->db->fetch('array');
		
		return $result[0];
	}
	
}
