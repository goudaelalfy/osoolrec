<?php

class combosModel
{
	
	private $db;
		
	public function __construct()
	{
		$this->db = new db();
		$this->db->connect();
	}
	
	public function get_all_company_type()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `company_type`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_country()
	{		
		
		$sql="SELECT `id`,  `code`,  `name_en`,  `name_ar`  FROM `countries` order by `id` desc";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_city($country_id)
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `cities` where country_id=$country_id order by `id`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_cities()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `cities` order by `id`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	
	public function get_all_currency()
	{		
		
		$sql="SELECT `id`,  `code`,  `name_en`,  `name_ar`  FROM `currency`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_gender()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `gender`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_grade()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `grade`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_job_type()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `job_type`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_marital_status()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `marital_status`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_military_status()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `military_status`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_position()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `position`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
	
	public function get_all_title()
	{		
		
		$sql="SELECT `id`,  `name_en`,  `name_ar`  FROM `title`";
		$this->db->query($sql);
		
		$result = $this->db->fetch_all();
		
		return $result;
	}
}
